@extends('layouts.app')

@section('content')

      <br><br>
        @if (session('message'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close"
                data-dismiss="alert"
                aria-label="close">&times;</a>
            {{ session('message') }}
        </div>
        @endif
      <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <a href="{{route('tarefas.create')}}" class="btn btn-success btn-xs pull-right"><b>+</b> Nova Tarefa</a>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Tarefa</th>
                <th scope="col">Descrição</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tarefas as $tarefa)
                <tr>
                    @if ($tarefa->user_id == Auth::user()->id)
                    <th scope="row">{{$tarefa->id}}</th>
                    <td>{{$tarefa->nome}}</td>
                    <td>{{$tarefa->descricao}}</td>
                    @if($tarefa->status == 1)
                        <td>Em adamento</td>
                    @elseif($tarefa->status == 0)
                        <td>Concluído</td>
                    @endif
                    <td>
                        <a href="{{route('tarefas.edit', $tarefa->id)}}"
                                data-toggle="tooltip"
                                data-placement="top"
                                title="Alterar"><i class="fa fa-pencil"></i>
                        </a>
                        &nbsp;<form style="display: inline-block;" method="POST"
                                    action="{{route('tarefas.destroy', $tarefa->id)}}"
                                    data-toggle="tooltip" data-placement="top"
                                    title="Excluir"
                                    onsubmit="return confirm('Confirma exclusão?')">
                            {{method_field('DELETE')}}{{ csrf_field() }}
                            <button type="submit" style="background-color: #fff">
                                <a><i class="fa fa-trash"></i></a>
                            </button></form>
                            &nbsp;<form style="display: inline-block;" method="POST"  action="{{route('tarefas.update')}}"
                                    enctype="multipart/form-data">
                                {!! method_field('put') !!}
                                {{ csrf_field() }}
                            <input type="hidden" name="status" value="0">
                            <input type="hidden" name="id" value="{{$tarefa->id}}">
                            <input type="hidden" name="nome" value="{{$tarefa->nome}}">
                            <input type="hidden" name="descricao" value="{{$tarefa->descricao}}">
                            <input type="hidden" name="user_id" value="{{$tarefa->user_id }}">
                            <button type="submit" style="background-color: #fff">
                                <a><i class="fa fa-check"></i></a>
                            </button></form>
                    </td>
                    @endif
                <tr>
                @endforeach
            </tbody>
        </table>
      </div>

@endsection
