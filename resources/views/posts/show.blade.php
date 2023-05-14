@extends('layouts.app')


@section('titulo')
{{$post->titulo}}
@endsection

@section('contenido')
<div class="container mx-10 md:flex ">
    <div class="md:w-1/2">
        <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Post Image {{ $post->titulo}}" >
        <div class="p-3 flex items-center gap-4">
            @auth
            @php
                $mensaje = "Hola Mundo desde la variable"
            @endphp
            <livewire:like-post :post="$post" />

           
            
          
            @endauth

        
        </div>

        <div>
            <p class="font-bold">{{$post->user->username}}</p>
            <p class="text-sm text-gray-500">
                {{$post->created_at->diffForHumans()}}
            </p>

            <p class="mt-5">
                {{ $post->descripcion}}
            </p>
        </div>
        @auth
            @if ($post->user_id === auth()->user()->id)
            <form action="{{route('posts.destroy', $post)}}" method="POST" >
                @method('DELETE')
                @csrf
                <input 
                type="submit"
                value="Delete Post"
                class="bg-red-500 hover:bg-red-600 p-2 rounded text-white cursor-pointer font-bold mt-5"
                >
             </form>
            @endif
        @endauth
    </div>


    <div class="md:w-1/2 p-5">
        
        <div class=" shadow bg-white p-5 mb-5">

            @auth
                
            
            <p class="text-xl font-bold text-center mb-4">Add Comment</p>

            @if (session('message'))

            <div class="bg-green-500 p-2 rounded-lg mb-6 text-white  text-center uppercase font-bold">
                {{session('message')}}
            </div>
                
            @endif

            <form action="{{ route('comentarios.store', ['post' => $post, 'user' => $user ] ) }}" method="POST">
                @csrf
                <div class ="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="comentario">
                        Comments
                    </label>
                    <textarea
                    id="comentario"
                    name="comentario"
                    placeholder=" AddComment"
                    class="border p-3 w-full rounded-lg @error('name') border-red-500
                        
                    @enderror"
                   
                    ></textarea>
    
                    @error('comentario')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                            @enderror
                        
                   
                </div>

                <input 
                type="submit" 
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                value="Send Comment">
            </form>
            @endauth
             

            <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                @if ($post->comentarios->count())
                @foreach ($post->comentarios  as $comentario )

                <div class="p-5 border-gray-300 border-b">

                    <a href="{{ route('posts.index', $comentario->user)}}" class="font-bold">
                        {{$comentario->user->username}}
                    </a>

                    <p>{{$comentario->comentario}}</p>
                    <p class="text-sm text-gray-500">{{$comentario->created_at->diffForHumans()}}</p> 
                </div>
                    
                @endforeach
                @else
                    <p class="p-10 text-center">No Comments</p>
                @endif
            </div>
        </div>

    </div>
</div>

@endsection