<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['path'];

    public function dataset()
    {
        return $this->belongsTo(Dataset::class);
    }

    public function boxes()
    {
        return $this->hasMany(Box::class);
    }

}
