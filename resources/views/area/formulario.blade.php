@extends('layout.principal')

@section('conteudo')
  <form action="{{ action('AreaController@gravar') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="id">ID</label>
      <input readonly type="text" class="form-control" id="id" name="id" value="{{ $area->id }}">
    </div>
    <div class="form-group">
      <label for="descricao">descricao</label>
      <input type="text" class="form-control" id="descricao" name="descricao" value="{{ $area->descricao }}">
    </div>
    <button type="submit" class="btn btn-primary">Gravar</button>
  </form>
@endsection
