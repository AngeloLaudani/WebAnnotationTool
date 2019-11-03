<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OntologyClass extends Model
{
    protected $fillable = ['class_name', 'context_class', 'target_class'];

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }

    public function labels()
    {
        return $this->hasMany(Label::class, 'class_id');
    }

    public function attributes()
    {
        return $this->hasMany(Attribute::class, 'class_id');
    }
}
