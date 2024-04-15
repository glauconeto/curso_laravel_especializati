@extends('layouts.app')

@section('title', 'Novo Usuários')

@section('content')
<h1>Criar usuário</h1>

@if ($errors->any())
    <ul class="errors">
        @foreach ($errors->all() as $error)
            <li class="error">{{  $error  }}</li>
        @endforeach
    </ul>
@endif

    <h1>Novo Usuário</h1>
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Nome: " value="{{ old('name') }}" required>
        <input type="email" name="email" placeholder="E-mail: " value="{{ old('email') }}" required>
        <input type="password" name="password" placeholder="Senha: " value="{{ old('password') }}" required>
        <button type="submit">Enviar</button>
    </form>
@endsection