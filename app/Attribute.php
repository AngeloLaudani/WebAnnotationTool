<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = ['attribute_name'];

    public function class()
    {
        return $this->belongsTo(OntologyClass::class);
    }

    public function values()
    {
        return $this->hasMany(Value::class);
    }
}
