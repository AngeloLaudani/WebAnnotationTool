<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    protected $fillable = [
    'image_id', 'text', 'src', 'x', 'y', 'width', 'height'
  ];

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function annotation()
    {
        return $this->hasOne(Annotation::class);
    }
}
