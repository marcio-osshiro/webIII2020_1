<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Starter Template · Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      body {
        margin: 2rem 0 1.5rem;
      }
      .starter-template {
        padding: 0rem 1.5rem;
      }
      h1 {
        position: fixed;
        top: -1.5rem;
        left: 0;
        text-align: center;
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
  </head>
  <body>
<h1>Listagem de áreas</h1>

<main role="main" class="container">
  <div class="starter-template">
    <table class="table table-striped table-bordered table-sm">
      <thead class="thead-dark">
        <tr>
          <td>ID</td>
          <td>Descrição</td>
        </tr>
      </thead>
      <tbody>
        @foreach ($areas as $area)
          <tr>
            <td>{{ $area->id }}</td>
            <td>{{ $area->descricao }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</main><!-- /.container -->
<div class="rodape">
  <script type="text/php">
      if (isset($pdf)) {
          $pdf->page_script('
              $text = __("Page :pageNum/:pageCount", ["pageNum" => $PAGE_NUM, "pageCount" => $PAGE_COUNT]);
              $font = null;
              $size = 9;
              $color = array(0,0,0);
              $word_space = 0.0;  //  default
              $char_space = 0.0;  //  default
              $angle = 0.0;   //  default

              // Compute text width to center correctly
              $textWidth = $fontMetrics->getTextWidth($text, $font, $size);

              $x = ($pdf->get_width() - $textWidth) / 2;
              $y = $pdf->get_height() - 35;

              $pdf->text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
          '); // End of page_script
      }
  </script>
</div>


</html>
