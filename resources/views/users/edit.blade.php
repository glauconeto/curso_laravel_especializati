@extends('layouts.app')

@section('title', "Editar o usuário $user->name ")

@section('content')
<h1>Editar usuário {{ $user->name }}</h1>

@if ($errors->any())
    <ul class="errors">
        @foreach ($errors->all() as $error)
            <li class="error">{{  $error  }}</li>
        @endforeach
    </ul>
@endif

    <h1>Novo Usuário</h1>
    <form action="{{ route('users.update', $user->id) }}" method="post">
        @method('PUT')
        @csrf
        <input type="text" name="name" placeholder="Nome: " value="{{ $user->name }}" required>
        <input type="email" name="email" placeholder="E-mail: " value="{{ $user->email }}" required>
        <input type="password" name="password" placeholder="Senha: " value="" required>
        <button type="submit">Enviar
    </form>
@endsection
