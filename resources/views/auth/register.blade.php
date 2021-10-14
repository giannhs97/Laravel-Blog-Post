@extends('layouts/app')

@section('content')
    <div class = 'flex justify-center'>
        <div class = 'w-4/12 bg-white p-6 rounded-lg'>
            <form action = "{{ route('register')}}" method = "post">

                @csrf

                <div class = "mb-4">
                    <label form = "name" class = "sr-only">Name</label>
                    <input type = "text" name = "name" id = "name" placeholder = "Your Name"
                    class = "bg-red-200 border-2 w-full p-4 rounded-lg @error('name')
                    border-red-500 @enderror" value = "{{old('name')}}">
     
                </div>

                <div class = "mb-4">
                    <label form = "username" class = "sr-only">Username</label>
                    <input type = "text" name = "username" id = "username" placeholder = "Username"
                    class = "bg-red-200 border-2 w-full p-4 rounded-lg @error('username')
                    border-red-500 @enderror" value = "{{old('username')}}">
                </div>

                <div class = "mb-4">
                    <label form = "email" class = "sr-only">Email</label>
                    <input type = "text" name = "email" id = "email" placeholder = "Your Email"
                    class = "bg-red-200 border-2 w-full p-4 rounded-lg @error('email')
                    border-red-500 @enderror" value = "{{old('email')}}">
                </div>

                <div class = "mb-4">
                    <label form = "password" class = "sr-only">Password</label>
                    <input type = "password" name = "password" id = "password" placeholder = "Choose a Password"
                    class = "bg-red-200 border-2 w-full p-4 rounded-lg @error('password')
                    border-red-500 @enderror" value = "">
                </div>

                <div class = "mb-4">
                    <label form = "password_confirmation" class = "sr-only">Password again</label>
                    <input type = "password" name = "password_confirmation" id = "password_confirmation" placeholder = "Repeat your Password"
                    class = "bg-red-200 border-2 w-full p-4 rounded-lg @error('password_confirmation')
                    border-red-500 @enderror" value = "">
                </div>

                <div>
                    <button type = "submit" class = "bg-red-500 text-black px-4 py-3 rounded
                    font-medium w-full hover:text-white">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection