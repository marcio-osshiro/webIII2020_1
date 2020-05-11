@extends('layout.principal')

@section('conteudo')
  <h1>Listagem de Professores</h1>
  <a href="{{ action('ProfessorController@novo')}}" class="btn btn-primary">Novo Professor</a>
  <table class="table table-striped table-bordered table-sm">
    <thead class="thead-dark">
      <tr>
        <td>ID</td>
        <td>Nome</td>
        <td></td>
      </tr>
    </thead>
    <tbody>
      @foreach ($professores as $professor)
        <tr>
          <td>{{ $professor->id }}</td>
          <td>{{ $professor->nome }}</td>
          <td>
            <a href="{{action('ProfessorController@editar', $professor->id)}}">Editar</a>
            <a href="{{action('ProfessorController@excluir', $professor->id)}}">Excluir</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
