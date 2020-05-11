@extends('layout.principal')

@section('conteudo')
  <form action="{{ action('ProfessorController@gravar') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="id">ID</label>
      <input readonly type="text" class="form-control" id="id" name="id" value="{{ $professor->id }}">
    </div>
    <div class="form-group">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" id="nome" name="nome" value="{{ $professor->nome }}">
    </div>
    <div class="form-group">
      <label for="email">E-mail</label>
      <input type="text" class="form-control" id="email" name="email" value="{{ $professor->email }}">
    </div>
    <div class="form-group">
      <label for="area_id">Area_id</label>
      <input type="text" class="form-control" id="area_id" name="area_id" value="{{ $professor->area_id }}">
    </div>
    <div class="form-group">
      <label for="foto">foto</label>
      <input type="text" class="form-control" id="foto" name="foto" value="{{ $professor->foto }}">
    </div>
    <button type="submit" class="btn btn-primary">Gravar</button>
  </form>
@endsection
