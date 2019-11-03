<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\Domain;
use App\Dataset;
use App\OntologyClass;
use App\Label;
use App\Attribute;
use App\AttributeSet;
use App\Value;
use App\Image;
use App\Box;
use App\Annotation;

class AnnotationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Restituisce la dashboard principale con tutte le immagini dei dataset
    public function index()
    {
        $datasets = Dataset::all();
        $domains = Domain::all();
        $images = Image::withCount('boxes')->orderBy('boxes_count', 'desc')->get();

        return view('annotations.annotation-main', compact('domains', 'datasets', 'images'));
    }

    // Filtro in base al dataset selezionato
    public function dataset_filter(Request $request)
    {
        $datasets = Dataset::where('domain_id', '=', $request->selected_domain)->get();
        foreach ($datasets as $dataset) {
            $images = Image::where('dataset_id', '=', $dataset->id)->withCount('boxes')->orderBy('boxes_count', 'desc')->get();
        }

        $view = view('layouts.images-showcase', compact('datasets', 'images'))->render();
        return response()->json(compact('view'));
    }

    // Filtro in base al numero di annotazioni
    public function annotation_filter(Request $request)
    {
        $datasets = Dataset::all();
        if ($request->order_by == 'most') {
            $images = Image::withCount('boxes')->orderBy('boxes_count', 'desc')->get();
        } else {
            $images = Image::withCount('boxes')->orderBy('boxes_count', 'asc')->get();
        }
        $view = view('layouts.images-showcase', compact('datasets', 'images'))->render();
        return response()->json(compact('view'));
    }

    // Restituisce pagina dove eseguire annotazione, con relativa immagine selezionata
    public function show(Image $image)
    {
        $dataset = $image->dataset()->find($image->dataset_id);
        return view('annotations.annotation-page', compact('image', 'dataset'));
    }

    // Restituisce pagina dove selezionare campi annotazione
    public function details(Image $image)
    {
        $dataset = $image->dataset()->find($image->dataset_id);
        $domain = $dataset->domain()->find($dataset->domain_id);
        $classes = $domain->classes()->where("domain_id", $domain->id)->get();

        return view('annotations.annotation-details', compact('image', 'dataset', 'classes', 'domain'));
    }

    // Filtro per domini definiti da upload-form che seleziona labels e attributi legati alla classe selezionata
    public function class_filter(Request $request)
    {
        $class_id = $request->class_id;
        $ontology_class = OntologyClass::where('id', '=', $class_id)->get();
        $labels = Label::where('class_id', '=', $class_id)->get();
        $attributes = Attribute::where('class_id', '=', $class_id)->get();
        foreach ($attributes as $attribute) {
            $values[] = Value::where('attribute_id', '=', $attribute->id)->get();
        }

        return response()->json(['label' => $labels, 'attribute' => $attributes, 'value' => $values, 'ontology_class'=> $ontology_class]);
    }

    // Salva l'annotazione con i relativi valori degli attributi per domini creati da upload-form
    public function store(Request $request)
    {
        $this->validate($request, [
    'class_select' => 'required',
    'label_select' => 'required'
  ]);

        $user = auth()->user();
        $class_name = OntologyClass::where('id', '=', $request->class_select)->value('class_name');
        $label_name = Label::where('id', '=', $request->label_select)->value('label_name');
        $box_id = $request->box_id;

        $annotation = Annotation::create([
        'user_id' => $user->id,
        'box_id' => $box_id,
        'class' => $class_name,
        'label' => $label_name
      ]);


        foreach ($request->attribute_select as $attribute_select) {
            $attribute_id = Value::where('id', '=', $attribute_select)->value('attribute_id');
            $attribute_name = Attribute::where('id', '=', $attribute_id)->value('attribute_name');
            $value_name = Value::where('id', '=', $attribute_select)->value('value_name');

            AttributeSet::create([
          'annotation_id' => $annotation->id,
          'attribute_name' => $attribute_name,
          'value_name' => $value_name
        ]);
        }

        return redirect('/annotations');
    }

    // Salva l'annotazione con i relativi valori degli attributi per domini da web service (con file .owl)
    public function store_owl(Request $request)
    {
        $this->validate($request, [
    'class_select' => 'required',
    'label_select' => 'required'
  ]);

        $user = auth()->user();
        $class_name = $request->get('class_select');
        $label_name = $request->get('label_select');
        $box_id = $request->box_id;

        $annotation = Annotation::create([
        'user_id' => $user->id,
        'box_id' => $box_id,
        'class' => $class_name,
        'label' => $label_name
      ]);

        $attribute_name = $request->get('attribute_name');
        $value_name = $request->get('attribute_select');

        for ($i=0; $i<count($attribute_name); $i++) {
            AttributeSet::create([
          'annotation_id' => $annotation->id,
          'attribute_name' => $attribute_name[$i],
          'value_name' => $value_name[$i]
        ]);
        }

        return redirect('/annotations');
    }
}
