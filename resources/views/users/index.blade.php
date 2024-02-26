<p>Listagem de Usuários</p>

<ul>
    @foreach($users as $user)
        <li>
            {{ $user->name }} -
            {{ $user->email }}
        </li>
    @endforeach
</ul>