@extends('layouts.app')

@section('title', 'Listagem dos Usuários')
@endsection

@section('content')
    <p>Listagem de Usuários</p>

    <ul>
        @foreach($users as $user)
        <li>
            {{ $user->name }} -
            {{ $user->email }} | <a href="{{ route('users.show', $user->id) }}">Detalhes</a>
        </li>
        @endforeach
    </ul>
@endsection