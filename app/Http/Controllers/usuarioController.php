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
    public function update(Request $request)
    {
        $usuario = Auth::user();

        // Trata o valor "null" enviado pelo formulário como campo vazio
        if ($request->input('senha') === 'null') {
            $request->merge(['senha' => null]);
        }

        $validated = $request->validate([
            'nome' => ['required', 'string', 'min:3', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:usuario,email,' . $usuario->id,
            ],
            'senha' => ['nullable', 'string', 'min:6'],
        ], [
            'nome.required' => 'O nome é obrigatório.',
            'nome.min' => 'O nome deve ter pelo menos :min caracteres.',
            'nome.max' => 'O nome não pode ultrapassar :max caracteres.',

            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'Informe um endereço de e-mail válido.',
            'email.unique' => 'Este e-mail já está cadastrado.',

            'senha.min' => 'A senha deve ter pelo menos :min caracteres.',
        ]);

        $dados = [
            'nome' => $validated['nome'],
            'email' => $validated['email'],
        ];

        // Só altera a senha se o campo for preenchido
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
