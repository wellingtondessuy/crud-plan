<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\Models\User;


class UsersController extends Controller
{
    
    public function index() {

        $users = User::where('removed', 0)->get();

        return view('users.index')
                ->with('users', $users)
                ;

    }

    public function add(Request $request) {

        return view('users.add');

    }

    public function create(StoreUser $request) {

        $user = new User;

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->phone = $request['phone'];

        if (!$user->save())
            return back()->withInput()->with('error', 'Ocorreu um erro inesperado ao salvar!');

        return redirect()->route('users')->with('success', 'Usuário criado com sucesso!');

    }

    public function edit($id) {

        $user = User::find($id);

        if (empty($user) || $user->removed == 1)
            return redirect()->route('users')->with('error', 'Usuário não encontrado!');

        return view('users.edit')
                ->with('user', $user);

    }

    public function update(UpdateUser $request, $id) {

        $user = User::find($id);

        if (empty($user) || $user->removed == 1)
            return redirect()->route('users')->with('error', 'Usuário não encontrado!');

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];

        if (!empty($request['password']))
            $user->password = Hash::make($request['password']);
        

        if (!$user->save())
            return back()->withInput()->with('error', 'Ocorreu um erro inesperado ao salvar!');

        return redirect()->route('users')->with('success', 'Usuário criado com sucesso!');

    }

    public function delete(Request $request, $id) {

        $user = User::find($id);

        if (empty($user) || $user->removed == 1)
            return redirect()->route('users')->with('error', 'Usuário não encontrado!');

        $user->removed = 1;

        if (!$user->save())
            return back()->withInput()->with('error', 'Ocorreu um erro inesperado ao remover usuário!');

        return redirect()->route('users')->with('success', 'Usuário removido com sucesso!');

    }

}
