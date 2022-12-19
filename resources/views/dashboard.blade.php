<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black">
                    <div class="flex justify-center text-center">
                        <div class="">
                            <form action="{{route('addPostName')}}" method="post" class="w-96">
                                @csrf
                                <h1 class="text-3xl font-bold">Add Your Post</h1>
                                <p><input class="border-double border-4 mb-1 border-sky-500 @error('post_title') border-red-400 @enderror rounded mt-3 w-full" value="{{old('post_title')}}" placeholder="Post Title" name="post_title" type="text">

                                <div class="error-msg text-start my-1">
                                    @error('post_title')
                                        <span class="text-red-500 text-sm">{{$message}}</span>
                                    @enderror
                                </div>

                                </p>
                                <p><textarea class="border-double border-4 border-sky-500 @error('post_content') border-red-400 @enderror rounded w-full my-1 resize-none" name="post_content" placeholder="Description" cols="20" rows="10">{{old('post_content')}}</textarea>

                                    <div class="error-msg text-start my-1">
                                        @error('post_content')
                                            <span class="text-red-500 text-sm">{{$message}}</span>
                                        @enderror
                                    </div>

                                </p>
                                <div class="flex justify-center mt-3">
                                    <button class="bg-gradient-to-r bg-teal-700 rounded text-white px-3 py-2 mr-3" type="submit">Add Post</button>
                                    <button class="bg-gradient-to-r bg-pink-700 rounded text-white px-3 py-2"><a href="{{route('allPostName')}}">Show All</a></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
