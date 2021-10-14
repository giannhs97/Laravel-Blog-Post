@props(['post' => $post])


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