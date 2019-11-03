<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Http\Request;
use App\User;
use App\UserPicture;
use App\Annotation;
use App\Box;
use App\Image;
use App\Dataset;
use App\Domain;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Restituisce la pagina utente con le relative informazioni legate all'utente (annotazioni eseguite, su quali dataset ecc)
    public function index(User $user)
    {
        $picture = $user->user_picture;
        if ($picture != null) {
            $user_picture = $picture->user_picture;
        } else {
            $user_picture = null;
        }

        $annotations_number = $user->annotations()->count();

        $annotations = Annotation::where('user_id', '=', $user->id)->get();
        if ($annotations->isEmpty()) {
            $domain_name = null;
            return view('user.user-page', compact('user', 'user_picture', 'annotations_number', 'domain_name'));
        } else {
            foreach ($annotations as $annotation) {
                $boxes[] = Box::where('id', '=', $annotation->box_id)->value('image_id');
            }
            foreach ($boxes as $box) {
                $images[] = Image::where('id', '=', $box)->value('dataset_id');
            }
            foreach ($images as $image) {
                $datasets[] = Dataset::where('id', '=', $image)->value('domain_id');
            }
            foreach ($datasets as $dataset) {
                $domains[] = Domain::where('id', '=', $dataset)->value('domain_name');
            }
            $domain_collection = collect($domains);
            $domain_name = $domain_collection->unique()->values()->all();
        }


        return view('user.user-page', compact('user', 'user_picture', 'annotations_number', 'domain_name'));
    }

    // Funzioni per aggiornare campi utente
    public function update_picture(Request $request)
    {
        $this->validate(request(), [
    'change_picture' => 'required'
  ]);

        $user = auth()->user();
        $picture = $request->file('change_picture');
        $picture_name = $picture->getClientOriginalName();
        $user->user_picture()->updateOrCreate(['user_id' => $user->id], ['user_picture'=> $picture_name]);
        Storage::disk('profile')->putFileAs($user->name, $picture, $picture_name);


        return redirect()->back();
    }

    public function update_name()
    {
        $this->validate(request(), [
    'change_name' => 'required'
  ]);

        $user_id = auth()->user()->id;
        User::where('id', '=', $user_id)->update(['name' => request('change_name')]);

        return redirect()->back();
    }

    public function update_email()
    {
        $this->validate(request(), [
    'change_email' => 'required|email'
  ]);
        $user_id = auth()->user()->id;
        User::where('id', '=', $user_id)->update(['email' => request('change_email')]);

        return redirect()->back();
    }
}
