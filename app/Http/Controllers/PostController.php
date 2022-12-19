<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Notifications\PostCreated;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function addPostFunction(Request $catchReq, FlasherInterface $flasher){

        $catchReq->validate([
            'post_title' => 'required',
            'post_content' => 'required'
        ]);

        $newPostInstense = new Post();
        $newPostInstense->post_title = $catchReq->post_title;
        $newPostInstense->post_content = $catchReq->post_content;
        $newPostInstense->post_date = now();
        $newPostInstense->save();

        $notifyTheUser = Auth::user();
        $notifyTheUser->notify(new PostCreated($newPostInstense));

        $flasher->addSuccess('A new post saved successfully');

        return redirect()->route('allPostName');
    }

    public function rekheDebo() {
        $grabPosts = Post::all();
        return view('all-posts', [
            'allPosts' => $grabPosts,
        ]);
    }

    public function editPostFunction($id, FlasherInterface $flasher){
        $findThisPost = Post::find($id);

        if(empty($findThisPost)){
            $flasher->addError('This post not found');
            return redirect()->route('dashboard');
        }

        return view('edit-post', [
            'postSendToBlade' => $findThisPost,
        ]);
    }

    public function updatePostFunction($id, Request $catch, FlasherInterface $flasher){
        $update = Post::find($id);

        $catch->validate([
            'post_title' => 'required',
            'post_content' => 'required'
        ]);

        $update->post_title = $catch->post_title;
        $update->post_content = $catch->post_content;
        $update->post_date = now();
        $update->save();

        $flasher->addSuccess('Your post is Updated Now!');

        return redirect()->route('allPostName');
    }

    public function deletePostFunction($id, FlasherInterface $flasher){
        $deletePost = Post::find($id);
        $deletePost->delete();

        $flasher->addSuccess('Post Successfully Deleted');

        return redirect()->route('allPostName');
    }
}
