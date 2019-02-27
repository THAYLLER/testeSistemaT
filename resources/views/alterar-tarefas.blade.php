@extends('layouts.app')

@section('content')
      <br><br>
      <div class="container">
            <div class="form-sec">

                <form name="formTarefa" id="qryform" method="POST" action="{{route('tarefas.update')}}"
                          enctype="multipart/form-data">
                        {!! method_field('put') !!}
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$tarefas->id}}">
                    <input type="hidden" name="status" value="{{$tarefas->status}}">
                    <input type="hidden" name="user_id" value="{{$tarefas->user_id }}">
                    <div class="form-group">
                        <label>Nome da tarefa</label>
                        <input type="text" class="form-control" id="name" placeholder="Insira o nome da tarefa" name="nome" required value="{{$tarefas->nome}}">
                    </div>
                    <div class="form-group">
                        <label>Descrição</label>
                        <textarea name="descricao" class="form-control" id="iq" placeholder="Insira a descrição da tarefa" required >{{$tarefas->descricao}}</textarea>
                    </div>


                    <button type="submit" class="btn btn-lg  btn-success">Alterar</button>
                    <a href="/tarefas" class="btn btn-lg  btn-danger"> Voltar</a>
                </form>
            </div>
      </div>

@endsection
