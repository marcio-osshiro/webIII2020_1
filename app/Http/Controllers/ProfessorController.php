<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professor;
use App\Area;
use Illuminate\Support\Str;
use App\Http\Requests\ProfessorRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\MensagemProfessor;

class ProfessorController extends Controller
{
    //
    public function __construct() {
      $this->middleware('auth');
    }

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

    function gravar(ProfessorRequest $request) {
      // não usarei o validate, estou utilizando ProfessoRequest
      // $validatedData = $request->validate(
      //     [
      //         'nome' => 'required|min:10',
      //         'email' => 'required|email:rfc,dns'
      //     ]);

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

    function enviar($id) {
      $professor = Professor::find($id);
      return view("professor.mensagem", compact('professor'));
    }

    function enviarMensagem() {
      $professor_id = $_POST['id'];
      $mensagem = $_POST['mensagem'];
      $professor = Professor::find($professor_id);
      Mail::to($professor->email)
        ->send(new MensagemProfessor($professor, $mensagem));
      return redirect()->action('ProfessorController@lista');

    }

}
