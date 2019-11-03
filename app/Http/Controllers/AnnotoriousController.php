<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Box;

class AnnotoriousController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Salva la bounding-box tracciata
    public function store()
    {
        $box = Box::create([
            'image_id' => request('image_id'),
            'text' => request('teks'),
            'src' => request('context'),
            'x' => request('x'),
            'y' => request('y'),
            'width' => request('width'),
            'height' => request('height')
          ]);

        return response()->json($box);
    }

    // Elimina la bounding-box
    public function destroy()
    {
        Box::where([
          'image_id' => request('image_id'),
          'text' => request('teks'),
          'src' => request('context'),
          'x' => request('x'),
          'y' => request('y'),
          'width' => request('width'),
          'height' => request('height')
        ])->delete();

        return response()->json('deleted');
    }

    // Aggiorna la bounding-box
    public function update()
    {
        Box::where([
            'image_id' => request('image_id'),
            'src' => request('context'),
            'x' => request('x'),
            'y' => request('y'),
            'width' => request('width'),
            'height' => request('height')
          ])->update(['text' => request('teks')]);

        return response()->json('updated');
    }

    // Carica le bounding-box tracciate per la specifica immagine
    public function load(Request $request)
    {
        $image_id = $request->image_id;
        $box = Box::where('image_id', '=', $image_id)->get();

        return response()->json($box);
    }

    // Carica l'ultima bounding-box per eseguire l'annotazione
    public function load_last(Request $request)
    {
        $image_id = $request->image_id;
        $box = Box::where('image_id', '=', $image_id)->get()->last();

        return response()->json($box);
    }
}
