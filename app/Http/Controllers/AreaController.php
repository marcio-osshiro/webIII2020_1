<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;

class AreaController extends Controller
{
    //
    function lista() {
      $areas = Area::all();
      return view("area.listagem", compact('areas'));
    }
}
