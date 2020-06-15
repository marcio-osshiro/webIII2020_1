@extends('layout.principal')

@section('conteudo')
  <h1>Listagem de áreas
    <a href="{{ action('AreaController@report')}}" class="btn btn-primary">Imprimir</a>

  </h1>
  <a href="{{ action('AreaController@novo')}}" class="btn btn-primary">Nova Área</a>
  <table class="table table-striped table-bordered table-sm">
    <thead class="thead-dark">
      <tr>
        <td>ID</td>
        <td>Descrição</td>
        <td></td>
      </tr>
    </thead>
    <tbody>
      @foreach ($areas as $area)
        <tr>
          <td>{{ $area->id }}</td>
          <td>{{ $area->descricao }}</td>
          <td>
            <a href="{{action('AreaController@editar', $area->id)}}">Editar</a>
            <a href="{{action('AreaController@excluir', $area->id)}}">Excluir</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $areas->links() }}
@endsection
