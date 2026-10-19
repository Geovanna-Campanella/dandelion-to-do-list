<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\usuarioModel;
use App\Http\Requests\UsuarioFormRequest;

class usuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsuarioFormRequest $request)
    {
        $validated = $request->validated();

        usuarioModel::create([
            'nome'  => $validated['nome'],
            'email' => $validated['email'],
            'senha' => bcrypt($validated['senha']),
        ]);

        return redirect('/')->with(
            'success',
            'Cadastro realizado com sucesso! Faça login para continuar.'
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsuarioFormRequest $request)
    {
        $usuario = Auth::user();

        $validated = $request->validated();

        $dados = [
            'nome' => $validated['nome'],
            'email' => $validated['email'],
        ];

        // Só altera a senha se o usuário preencher esse campo
        if (!empty($validated['senha'])) {
            $dados['senha'] = Hash::make($validated['senha']);
        }

        $usuario->update($dados);

        return redirect('/mostrarUsuario')->with(
            'success',
            'Dados atualizados com sucesso!'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    //

    public function fazerLogin(Request $request)
    {
        $credenciais = [
            'email' => $request->email,
            'password' => $request->senha
        ];

        if (Auth::attempt($credenciais)) {
            $request->session()->regenerate();

            return redirect('/mostrarUsuario');
        }

        return redirect('/');
    }

    public function mostrarUsuario()
    {
        $usuario = Auth::user();

        $tarefas = $usuario->tarefas()
            ->orderBy('dataInicio')
            ->get();

        return view(
            'nivelDashboard.dashboard',
            compact('usuario', 'tarefas')
        );
    }

    
    public function fazerLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }



}
