@extends('layout.principal')

@section('conteudo')
  <form action="{{ action('ProfessorController@enviarMensagem') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="id">ID</label>
      <input readonly type="text" class="form-control" id="id" name="id" value="{{ $professor->id }}">
    </div>
    <div class="form-group">
      <label for="nome">Nome</label>
      <input readonly type="text" class="form-control id="nome" name="nome"
        value="{{ old('nome', $professor->nome) }}">
    </div>
    <div class="form-group">
      <label for="email">Digite a mensagem: </label>
      <textarea class="form-control" id="mensagem" name="mensagem" rows="10"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
@endsection
