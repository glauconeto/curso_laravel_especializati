<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * Retorna todos os usuários armazenados.
     * 
     * @return void
     */
    public function index(Request $request)
    {
        $users = $this->model->getUsers(search: $request->search ?? '');

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
        // $user = $this->model->where('id', $id)->first();
        $user = $this->model->find($id);

        if (!$user = $this->model->find($id))
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

        $this->model->create($data);

        return redirect()->route('users.index');
        // return redirect('users.show', $user->id);

        // $user = new User;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;
        // $user->save();
    }

    public function edit(int $id)
    {
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');

        return view('users.edit', compact('user'));
    }

    public function update(StoreUpdateUserFormRequest $request, int $id)
    {
        $user = $request->all();

        if (!$user = $this->model->find($id))
            return redirect()->route('users.show');

        $data = $request->only('name', 'email');

        if ($request->password)
            $data['password'] = bcrypt($request->password);

        $user->update($data);

        return redirect()->route('users.index');
    }

    /**
     * Remove um usuário dos registros.
     * 
     * @param int $id
     * @return void redirect
     */
    public function destroy(int $id)
    {
        $user = $this->model->find($id);

        if (!$user = $this->model->find($id))
            return redirect()->route('users.show');

        $user->delete();

        return redirect()->route('users.index');
    }
}
