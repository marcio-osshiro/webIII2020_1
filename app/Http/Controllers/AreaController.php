<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;

class AreaController extends Controller
{
    //
    function lista() {
      $areas = Area::all();

      // visão localizado em resources/views
      return view("area.listagem", compact('areas'));
    }

    function novo() {
      $area = new Area();
      return view("area.formulario", compact('area'));
    }

    function gravar(Request $request) {
      $area = new Area();
      $area->descricao = $request->input('descricao');
      $area->save();
      return redirect()->action('AreaController@lista');
    }


}
