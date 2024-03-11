<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Retorna todos os usuários armazenados.
     * 
     * @return void
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Mostra informações de apenas um usuário.
     * 
     * @param int $id
     * @return void
     */
    public function show(int $id)
    {
        // $user = User::where('id', $id)->first();
        $user = User::find($id);

        if (!$user = User::find($id))
            return redirect()->route('users.show');

        
        return view('users.show', compact('user'));
    }
    
    /**
     * Mostra o formulário de registro de usuários.
     *
     * @return void
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Armazena os dados vindos do formulário.
     * 
     * @return 
     */
    public function store()
    {
        dd('cadastrando o usuário');
    }
}
