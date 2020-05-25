@extends('layout.principal')

@section('conteudo')
  @if ($professor->foto != "")
    <img class="foto-professor" src="{{asset('imagens/'.$professor->foto)}}">
  @else
    <img class="foto-professor" src="{{asset('imagens/anonimo.png')}}">
  @endif

  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <form action="{{ action('ProfessorController@gravar') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="id">ID</label>
      <input readonly type="text" class="form-control" id="id" name="id" value="{{ $professor->id }}">
    </div>
    <div class="form-group">
      <label for="nome">Nome</label>
      <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome"
        value="{{ old('nome', $professor->nome) }}">
      @error('nome')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="email">E-mail</label>
      <input type="text" class="form-control  @error('email') is-invalid @enderror" id="email" name="email"
      value="{{ old('email', $professor->email) }}">
      @error('email')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
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
