<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
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
     * @param Request $request
     * @return void
     */
    public function store(StoreUpdateUserFormRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $user = User::create($data);

        return redirect()->route('users.index');
        // return redirect('users.show', $user->id);

        // $user = new User;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;
        // $user->save();
    }

    public function edit($id)
    {
        if (!$user = User::find($id))
            return redirect()->route('users.index');

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = $request->all();

        if (!$user = User::find($id))
            return redirect()->route('users.show');

        dd($request->all());
    }
}
