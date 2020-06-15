<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;

class AreaController extends Controller
{
    //
    public function __construct() {
      $this->middleware('auth');
    }

    function lista() {
      //$areas = Area::all();
      $areas = Area::paginate(10);
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

    function report() {
      $areas = Area::all();

      $pdf = app('dompdf.wrapper');
      $pdf->getDomPDF()->set_option("enable_php", true);
      $pdf->loadView('area.report', compact('areas'));
      return $pdf->download("relatorioArea.pdf");
    }



}
