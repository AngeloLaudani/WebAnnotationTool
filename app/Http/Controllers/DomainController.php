<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    // Restituisce la pagina di upload
    public function index()
    {
        return view('domain.upload-page');
    }

    // Salva il dominio e la relativa ontologia
    public function store(Request $request)
    {
        $this->validate($request, [

         'domain_name' => 'required',
         'dataset_name' => 'required',

       ]);

        $owl_file = $request->file('ontology-file');

        if ($owl_file == null) {

        // Domain
            $domain = auth()->user()->domains()->create(['domain_name'=>request('domain_name'), 'type'=>request('type')]);

            //Classi e Label
            $class_name = $request->get('class_name');
            $context_class = $request->get('context_class');
            $target_class = $request->get('target_class');
            $label_name = $request->get('label_name');
            $attribute_name = $request->get('attribute_name');
            $value_name = $request->get('value_name');
            $sample = $request->file('sample', []);
            $sample_description = $request->get('sample_description');


            for ($i=1; $i <= count($class_name) ; $i++) {
                if (empty($class_name[$i])) {
                    break;
                }
                foreach ($class_name[$i] as $class_key) {
                    foreach ($context_class[$i] as $context_key) {
                        foreach ($target_class[$i] as $target_key) {
                            $class = $domain->classes()->create(['class_name'=> $class_key, 'context_class'=> $context_key, 'target_class'=> $target_key ]);

                            foreach ($label_name[$i] as $label_key) {
                                $class->labels()->create(['label_name'=> $label_key ]);
                            }
                        }
                    }
                }

                // Trovare parametro per ottimizzare for
                for ($k=1; $k <= 60 ; $k++) {
                    if (isset($attribute_name[$i][$k])) {
                        foreach ($attribute_name[$i][$k] as $attribute_key) {
                            $attribute = $class->attributes()->create(['attribute_name'=> $attribute_key ]);

                            for ($j=1; $j <= 60 ; $j++) {
                                if (isset($value_name[$i][$k][$j])) {
                                    foreach ($value_name[$i][$k][$j] as $value_key) {
                                        if (isset($sample[$i][$k][$j])) {
                                            foreach ($sample[$i][$k][$j] as $sample_key) {
                                                foreach ($sample_description[$i][$k][$j] as $description_key) {
                                                    if ($description_key == null) {
                                                        $description_key = 'No Sample Description';
                                                    }
                                                    $sample_name = $sample_key->getClientOriginalName();
                                                    Storage::disk('sample')->putFileAs($attribute_key, $sample_key, $sample_name);
                                                    $attribute->values()->create(['value_name'=> $value_key, 'sample_path'=> $sample_name, 'sample_description'=> $description_key ]);
                                                }
                                            }
                                        } else {
                                            foreach ($sample_description[$i][$k][$j] as $description_key) {
                                                if ($description_key == null) {
                                                    $description_key = 'No Sample Description';
                                                }
                                                $attribute->values()->create(['value_name'=> $value_key, 'sample_path'=> 'No Sample Available', 'sample_description'=> $description_key ]);
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        } else {
            $owl_folder = basename($owl_file->getClientOriginalName(), '.'.$owl_file->getClientOriginalExtension());
            $owl_name = $owl_file->getClientOriginalName();
            Storage::disk('ontology')->putFileAs("$owl_folder/Owl", $owl_file, $owl_name);
            $sample_file = $request->file('sample-file');
            if ($sample_file != null) {
                $sample_name = $sample_file->getClientOriginalName();
                Storage::disk('ontology')->putFileAs("$owl_folder/Sample", $sample_file, $sample_name);
            }

            // Domain
            $domain = auth()->user()->domains()->create(['domain_name'=>request('domain_name'), 'owl_path'=> $owl_name, 'type'=>request('type')]);
        }



        //Dataset
        $dataset_name = request('dataset_name');
        $dataset = $domain->dataset()->create(['dataset_name'=>$dataset_name]);

        //Salvataggio File Upload
        foreach ($request->file('files', []) as $images) {
            $image_name = $images->getClientOriginalName();
            Storage::disk('dataset')->putFileAs($dataset_name, $images, $image_name);
            $dataset->images()->create(['path'=> $image_name]);
        }

        //Redirect
        return redirect('/annotations');
    }
}
