<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarefas;

class TarefasController extends Controller
{
    public function index() {
        $tarefas = Tarefas::all();
        $total = Tarefas::all()->count();
        return view('lista-tarefas', compact('tarefas', 'total'));
    }

    public function create() {
        return view('nova-Tarefa');
    }

    public function store(Request $request) {
        $tarefas = new Tarefas;
        $tarefas->nome = $request->nome;
        $tarefas->descricao = $request->descricao;
        $tarefas->status = $request->status;
        $tarefas->user_id = $request->user_id;
        $tarefas->save();
        return redirect()->route('tarefas')->with('message', 'Tarefas criado com sucesso!');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $tarefas = Tarefas::findOrFail($id);
        return view('alterar-tarefas', compact('tarefas'));
    }

    public function update(Request $request) {
        $tarefas = Tarefas::findOrFail($request->id);
        $tarefas->nome = $request->nome;
        $tarefas->descricao = $request->descricao;
        $tarefas->status = $request->status;
        $tarefas->save();
        return redirect()->route('tarefas')->with('message', 'Tarefas alterado com sucesso!');
    }

    public function destroy($id) {
        $tarefas = Tarefas::findOrFail($id);
        $tarefas->delete();
        return redirect()->route('tarefas')->with('message', 'Tarefas excluído com sucesso!');
    }

}
