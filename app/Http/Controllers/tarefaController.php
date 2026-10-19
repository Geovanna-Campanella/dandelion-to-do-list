<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\tarefaModel;
use App\Http\Requests\TarefaFormRequest;

class tarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuario = Auth::user();

        $tarefas = tarefaModel::where(
            'usuario_id',
            Auth::id()
        )->get();

        return view('niverDashboard.dashboard', compact('usuario', 'tarefas'));
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
    public function store(TarefaFormRequest $request)
    {
        $dados = $request->validated();

        $validated = $request->validate([
            'titulo'       => 'required|string|max:255',
            'descricao'    => 'required|string',
            'dataInicio'   => 'required|date',
            'dataTermino'  => 'required|date|after_or_equal:dataInicio',
            'prioridade'   => 'required|in:Alta,Média,Baixa',
            'status'       => 'required|in:Andamento,Concluída,Pendente',
            'categoria'    => 'required|string|max:100',
        ]);

        Auth::user()->tarefas()->create($validated);

        return redirect('/dashboard')->with(
            'success',
            'Tarefa cadastrada com sucesso!'
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
    public function edit($id)
    {
        $tarefa = Auth::user()->tarefas()->findOrFail($id);

        return view('nivelTarefa.editarTarefa', compact('tarefa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TarefaFormRequest $request, $id)
    {
        $tarefa = Auth::user()->tarefas()->findOrFail($id);

        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'dataInicio' => 'required|date',
            'dataTermino' => 'required|date|after_or_equal:dataInicio',
            'prioridade' => 'required|in:Alta,Média,Baixa',
            'status' => 'required|in:Em Andamento,Concluída,Pendente',
            'categoria' => 'required|string|max:100',
        ]);

        $tarefa->update($validated);

        return redirect('/dashboard')->with(
            'success',
            'Tarefa atualizada com sucesso!'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tarefa = Auth::user()->tarefas()->findOrFail($id);

        $tarefa->delete();

        return redirect('/dashboard')->with(
            'success',
            'Tarefa excluída com sucesso!'
        );
    }
}
