<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Listagem de áreas</h1>
    @foreach ($areas as $area)
      <p>{{ $area->descricao }}</p>
    @endforeach
  </body>
</html>
