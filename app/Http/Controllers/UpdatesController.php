<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Update;

class UpdatesController extends Controller
{
    public function create (Request $r) {
      $r->validate([
        "title" => "required",
        "description" => "required",
        "type" => "required",
      ]);

      $u = new Update;
      $u->title = $r->title;
      $u->description = $r->description;
      $u->type = $r->type;
      $u->save();
      return back();
    }

    public function remove(Request $r) {
      Update::find($r->id)->delete();
      return back();
    }
}
