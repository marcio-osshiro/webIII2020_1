@extends('layout.principal')

@section('conteudo')
  @if ($professor->foto != "")
    <img class="foto-professor" src="{{asset('imagens/'.$professor->foto)}}">
  @else
    <img class="foto-professor" src="{{asset('imagens/anonimo.png')}}">
  @endif

  <form action="{{ action('ProfessorController@gravar') }}" method="POST" enctype="multipart/form-data">
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
      <select class="custom-select" name="area_id">
        @foreach($areas as $area)
          <option {{$area->id==$professor->area_id?'selected':''}} value="{{$area->id}}">{{$area->descricao}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="foto">foto</label>
      <input type="file" class="form-control" id="foto" name="foto">
    </div>
    <button type="submit" class="btn btn-primary">Gravar</button>
  </form>
@endsection
