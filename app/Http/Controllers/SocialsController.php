<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Social;

class SocialsController extends Controller
{
    public function create (Request $r) {
      $r->validate([
        "url" => "required|active_url",
        "type" => "required",
      ]);

      $s = new Social;
      $s->url = $r->url;
      $s->platform = $r->type;
      $s->save();
      return back();
    }

    public function remove(Request $r) {
      Social::find($r->id)->delete();
      return back();
    }
}
