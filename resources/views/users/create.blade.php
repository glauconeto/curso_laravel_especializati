@extends('layouts.app')

@section('title', 'Novo Usuários')

@section('content')
    <h1>Novo Usuário</h1>
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Nome: " required>
        <input type="email" name="email" placeholder="E-mail: " required>
        <input type="password" name="password" placeholder="Senha: " required>
        <button type="submit">Enviar</button>
    </form>
@endsection