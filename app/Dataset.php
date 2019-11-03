<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dataset extends Model
{
    protected $fillable = ['dataset_name'];

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
