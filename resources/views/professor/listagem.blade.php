@extends('layout.principal')

@section('conteudo')
<style>
  .foto-professor {
    width: 50px;
  }
</style>
  <h1>Listagem de Professores</h1>
  <a href="{{ action('ProfessorController@novo')}}" class="btn btn-primary">Novo Professor</a>
  <table class="table table-striped table-bordered table-sm">
    <thead class="thead-dark">
      <tr>
        <td>ID</td>
        <td>Nome</td>
        <td>E-mail</td>
        <td>Area</td>
        <td>Foto</td>
        <td></td>
      </tr>
    </thead>
    <tbody>
      @foreach ($professores as $professor)
        <tr>
          <td>{{ $professor->id }}</td>
          <td>{{ $professor->nome }}</td>
          <td>{{ $professor->email }}</td>
          <td>{{ $professor->area->descricao }}</td>
          <td>
            @if ($professor->foto != "")
              <img class="foto-professor" src="{{asset('imagens/'.$professor->foto)}}">
            @else
              <img class="foto-professor" src="{{asset('imagens/anonimo.png')}}">
            @endif
          </td>
          <td>
            <a href="{{action('ProfessorController@editar', $professor->id)}}">Editar</a>
            <a href="{{action('ProfessorController@excluir', $professor->id)}}">Excluir</a>
            <a href="{{action('ProfessorController@enviar', $professor->id)}}">Mensagem</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
