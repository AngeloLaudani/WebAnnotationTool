<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    protected $fillable = ['label_name'];

    public function class()
    {
        return $this->belongsTo(OntologyClass::class);
    }
}
