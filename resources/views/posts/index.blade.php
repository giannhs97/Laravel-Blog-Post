@extends('layouts/app')

@section('content')
    <div class = 'flex justify-center'>
        <div class = 'w-8/12 bg-white p-6 rounded-lg'>
            <form action = "{{ route('posts') }}" method = "post" class = "mb-4">
                @csrf
                <div class = "mb-4">
                    <label for = "body" class = "sr-only">Body</label>
                    <textarea name = "body" id = "body" cols = "30" rows = "4" class = "bg-red-100
                    border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
                    placeholder = "Post your thoughts!"></textarea>
                </div>

                <div>
                    <button type = "submit" class = "bg-red-500 text-white px-4 py-2 rounded 
                    font-medium">Post</button>
                </div>


            </form>

            @if($posts -> count())
                @foreach ($posts as $post)
                    <div class = "mb-4">
                        <a href = "{{route('users.posts', $post -> user)}}" class = "font-bold">
                            {{$post -> user -> username}}</a><span 
                        class = "text-red-300 text-sm ml-2">{{$post -> created_at -> diffForHumans()}}</span>

                        <p class = "mb-2"> {{$post -> body}}</p>

                        <div class = "flex items-center">
                            @auth
                                @if (!$post -> likedBy(auth() -> user()))
                                    <form action = "{{route('posts.likes', $post)}}" method = "post" 
                                        class = "mr-1">
                                        @csrf
                                        <button type = "submit" class = "text-blue-600">Like</button>
                                    </form>
                                @else
                                    <form action = "{{route('posts.likes', $post)}}" method = "post" class = "mr-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type = "submit" class = "text-red-600">Unlike</button>
                                    </form>
                                @endif

                                
                                @can('delete', $post)
                                    <form action = "{{route('posts.destroy', $post)}}" method = "post" class = "pr-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type = "submit" class = "text-black-600">Delete</button>
                                        </form>
                                @endcan
                                
                            @endauth
                            <span>{{$post -> likes -> count()}} {{Str :: plural('like',
                                $post -> likes -> count())}}</span>

                        </div>
                    </div>
                @endforeach

                {{$posts -> links()}}

            @else
                <p>There are no posts</p> 
            @endif

        </div>
    </div>
@endsection