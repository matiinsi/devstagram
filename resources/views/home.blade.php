@extends('layouts.app')

@section('titulo', 'Inicio')

@section('contenido')
    <x-listar-posts :posts="$posts" />
@endsection
