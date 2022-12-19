<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="">
                        <h1 class="text-center font-bold text-3xl">All Posts</h1><br>
                            <div>
                                <div class="flex flex-col text-center">
                                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="overflow-hidden">
                                        <table class="min-w-full">
                                            <thead class="border">
                                            <tr class="bg-emerald-500">
                                                <th scope="col" class="text-sm font-medium border text-white px-6 py-4">
                                                ID
                                                </th>
                                                <th scope="col" class="text-sm font-medium border text-white px-6 py-4">
                                                Post Title
                                                </th>
                                                <th scope="col" class="text-sm font-medium border text-white px-6 py-4"">
                                                Post Content
                                                </th>
                                                <th scope="col" class="text-sm font-medium border text-white px-6 py-4">
                                                Date
                                                </th>
                                                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                                Edit Or Delete
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($allPosts as $post)
                                                <tr class="">
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium border text-gray-900">{{$post->id}}</td>
                                                    <td class="text-sm text-gray-900 font-light border px-6 py-4 whitespace-nowrap">
                                                        {{$post->post_title}}
                                                    </td>
                                                    <td class="text-sm text-gray-900 font-light border px-6 py-4 whitespace-nowrap" >
                                                        {{$post->post_content}}
                                                    </td>
                                                    <td class="text-sm text-gray-900 font-light border px-6 py-4 whitespace-nowrap">
                                                        {{$post->post_date}}
                                                    </td>
                                                    <td class="text-sm text-gray-900 font-light border px-6 py-4 whitespace-nowrap">
                                                        <span class="bg-violet-700 py-1 px-2 rounded text-white"><a href="{{route('editPostName', $post->id)}}">Edit</a></span>
                                                        <span class="bg-red-700 py-1 px-2 rounded text-white"><a href="{{route('deletePostName', $post->id)}}">Delete</a></span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        <div class="flex justify-center">
                            <button class="bg-gradient-to-r bg-indigo-800 text-white px-5 mt-3 rounded py-2"><a href="{{route('dashboard')}}">Add New Post</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
