@extends('layouts.app')

@section('title', "Novo comentário do usuário {$user->name}")

@section('content')
<h1 class="w-full text-3xl text-black pb-6">
    Adicionar Comentário do usuário {{ $user->name }}
</h1>

@include('includes.validations-form')

<div class="flex flex-wrap">
    <div class="w-full my-6 pr-0 lg:pr-2">
        <div class="leading-loose">
            <form class="p-10 bg-white rounded shadow-xl" action="{{ route('comments.store', $user->id) }}" method="POST">
                @include('users.comments._partials.form')
            </form>
        </div>
    </div>
</div>
@endsection