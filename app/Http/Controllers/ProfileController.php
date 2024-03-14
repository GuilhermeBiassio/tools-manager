<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;


class ProfileController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name', 'ASC')->get();
        return view('admin.profile.index')->with('users', $users)->with('title', 'Users List');
    }
    /**
     * Display the user's profile form.
     */
    public function edit($id): View
    {
        $user = User::find($id);
        return view('admin.profile.edit')->with([
            'id' => $id,
            'title' => 'Update User',
            'user' => $user,
            'action' => route('profile.update', $id)
        ]);
    }

    public function create()
    {
        return view('admin.profile.create')->with([
            'title' => 'Register',
            'action' => route('register')
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'id' => ['required', 'integer'],
            'is_admin' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['sometimes', 'nullable', 'string', 'lowercase', 'email', 'max:255'],
        ], [
            'id' => 'O campo código deve ser um número inteiro.'
        ]);
        $data = User::find($id);

        if ($request->password == NULL) {
            $data->fill($request->only('id', 'is_admin', 'name', 'email'));
        } else {
            $request->validate([
                'password' => ['required', 'confirmed', 'min:5'],
            ]);
            $request->password = Hash::make($request->password);
            $data->fill($request->all());
        }
        // dd($data);
        $data->update();

        return Redirect::route('profile.index')->with('success.message', 'Perfil atualizado!');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request, $id): RedirectResponse
    {
        User::destroy($id);
        return Redirect::route('profile.index')->with('success.message', 'Usuário excluído com sucesso!');
    }
}
