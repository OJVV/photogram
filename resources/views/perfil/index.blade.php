@extends('layouts.app')


@section('titulo')
Edit Profile: {{ auth()->user()->username}}

@endsection

@section('contenido')
<div class="md:flex md:justify-center">
    <div class="md:w-1/2 bg-white shadow p-6">
    <form method ="POST" action="{{ route('perfil.store')}}" enctype="multipart/form-data"class="mt-10 md:mt-0">
        @csrf
        <div class ="mb-5">
            <label class="mb-2 block uppercase text-gray-500 font-bold" for="username">
                Username
            </label>
            <input 
            type="text"
            id="username"
            name="username"
            placeholder="Your Username"
            class="border p-3 w-full rounded-lg @error('username') border-red-500
                
            @enderror"
            value="{{ auth()->user()->username }}">

            @error('username')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message}}</p>
            @enderror
                
        </div>

        <div class ="mb-5">
            <label class="mb-2 block uppercase text-gray-500 font-bold" for="imagen">
                Image Profile
            </label>
            <input 
                type="file"
                id="imagen"
                name="imagen"
                class="border p-3 w-full rounded-lg"
                value=""
                accept=".jpg, .png, .jpeg"
            >      
        </div>

        <div class ="mb-5">
            <label class="mb-2 block uppercase text-gray-500 font-bold" for="email">
                Email
            </label>
            <input 
            type="email"
            id="email"
            name="email"
            placeholder="Your Email"
            class="border p-3 w-full rounded-lg @error('email') border-red-500
                
            @enderror"
            value="{{ auth()->user()->email }}">

            @error('email')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message}}</p>
            @enderror
                
        </div>

        
    

        <input 
            type="submit" 
            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
            value="Save Changes">
    </form>
    </div>
</div>
@endsection