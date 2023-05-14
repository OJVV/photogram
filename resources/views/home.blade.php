@extends('layouts.app')

@section('titulo')
Notices
@endsection

@section('contenido')

<x-listar-post :posts="$posts" />



@endsection