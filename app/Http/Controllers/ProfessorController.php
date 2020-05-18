<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professor;
use App\Area;
use Illuminate\Support\Str;


class ProfessorController extends Controller
{
    //
    //
    function lista() {
      $professores = Professor::all();
      // visão localizado em resources/views
      return view("professor.listagem", compact('professores'));
    }

    function novo() {
      $professor = new Professor();
      $areas = Area::all();
      return view("professor.formulario", compact('professor','areas'));
    }

    function gravar(Request $request) {
      $id = $request->input('id');
      if ($id==0) {
        $professor = new Professor();
        $professor->foto = "";
      } else {
        $professor = Professor::find($id);
      }
      $file = $request->file('foto');
      if (isset($file)) {
        $random_name = Str::random(40);
        $extension = $file->getClientOriginalExtension();
        $filename = $random_name.'.'.$extension;
        $upload = $file->move(public_path('imagens'), $filename);
        $professor->foto = $filename;
      }
      $professor->nome = $request->input('nome');
      $professor->email = $request->input('email');
      $professor->area_id = $request->input('area_id');
      $professor->save();
      return redirect()->action('ProfessorController@lista');
    }

    function editar($id) {
      $professor = Professor::find($id);
      $areas = Area::all();
      return view("professor.formulario", compact('professor','areas'));
    }

    function excluir($id) {
      $professor = Professor::find($id);
      $professor->delete();
      return redirect()->action('ProfessorController@lista');
    }
}
