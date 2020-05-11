<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professor;

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
      return view("professor.formulario", compact('professor'));
    }

    function gravar(Request $request) {
      $id = $request->input('id');
      if ($id==0) {
        $professor = new Professor();
      } else {
        $professor = Professor::find($id);
      }
      $professor->nome = $request->input('nome');
      $professor->email = $request->input('email');
      $professor->area_id = $request->input('area_id');
      $professor->foto = $request->input('foto');
      $professor->save();
      return redirect()->action('ProfessorController@lista');
    }

    function editar($id) {
      $professor = Professor::find($id);
      return view("professor.formulario", compact('professor'));
    }

    function excluir($id) {
      $professor = Professor::find($id);
      $professor->delete();
      return redirect()->action('ProfessorController@lista');
    }
}
