<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;

class AreaController extends Controller
{
    //
    function lista() {
      $area = new Area();
      $areas = Area::all();
      // visão localizado em resources/views
      return view("area.listagem", compact('areas'));
    }

    function novo() {
      $area = new Area();
      return view("area.formulario", compact('area'));
    }

    function gravar(Request $request) {
      $id = $request->input('id');
      if ($id==0) {
        $area = new Area();
      } else {
        $area = Area::find($id);
      }
      $area->descricao = $request->input('descricao');
      $area->save();
      return redirect()->action('AreaController@lista');
    }

    function editar($id) {
      $area = Area::find($id);
      return view("area.formulario", compact('area'));
    }

    function excluir($id) {
      $area = Area::find($id);
      $area->delete();
      return redirect()->action('AreaController@lista');
    }



}
