<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $fillable = ['domain_name', 'owl_path', 'type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function classes()
    {
        return $this->hasMany(OntologyClass::class);
    }

    public function dataset()
    {
        return $this->hasOne(Dataset::class);
    }

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
}
