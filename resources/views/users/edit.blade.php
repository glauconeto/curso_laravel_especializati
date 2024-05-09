@extends('layouts.app')

@section('title', "Editar o usuário $user->name ")

@section('content')
<h1>Editar usuário {{ $user->name }}</h1>

    @include('includes.validation_form')
    <form action="{{ route('users.update', $user->id) }}" method="post">
        @method('PUT')
        @include('users._partials.form')       
    </form>
@endsection
