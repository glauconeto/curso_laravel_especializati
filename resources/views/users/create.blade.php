@extends('layouts.app')

@section('title', 'Novo Usuários')

@section('content')
<h1>Criar usuário</h1>

    <h1>Novo Usuário</h1>
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        @include('users._partials.form')
    </form>
@endsection