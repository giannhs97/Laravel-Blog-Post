@extends('layouts/app')

@section('content')
    <div class = 'flex justify-center'>
        <div class = 'w-4/12 bg-white p-6 rounded-lg'>
            @if (session('status'))
            <div class = "bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                {{session('status')}}
            </div>
            @endif    
            
            
            <form action = "{{ route('login')}}" method = "post">

                @csrf

                <div class = "mb-4">
                    <label form = "email" class = "sr-only">Email</label>
                    <input type = "text" name = "email" id = "email" placeholder = "Your Email"
                    class = "bg-red-200 border-2 w-full p-4 rounded-lg @error('email')
                    border-red-500 @enderror" value = "{{old('email')}}">
                </div>

                <div class = "mb-4">
                    <label form = "password" class = "sr-only">Password</label>
                    <input type = "password" name = "password" id = "password" placeholder = "Your Password"
                    class = "bg-red-200 border-2 w-full p-4 rounded-lg @error('password')
                    border-red-500 @enderror" value = "">
                </div>

                <div class = "mb-4">
                    <div class = "flex items-center">
                        <input type = "checkbox" name = "remember" id = "remember" class = "mr-2">
                        <label form = "remember">Remember me</label>
                    </div>
                </div>
                    
                <div>
                    <button type = "submit" class = "bg-red-500 text-black px-4 py-3 rounded
                    font-medium w-full hover:text-white">Log-in</button>
                </div>
            </form>
        </div>
    </div>
@endsection