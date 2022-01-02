<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    public function wisata(Posts $posts){
        $data = $posts->latest()->take(6)->get();
        return view('wisataku', compact('data'));
    }
    public function isi_post($slug){
        $data = Posts::where('slug', $slug)->get();
        return view('tampilan_web.isi_postingan', compact('data'));
    }
}
