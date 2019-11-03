<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annotation extends Model
{
    protected $fillable = [
    'box_id', 'user_id', 'class', 'label', 'attribute_set_id'
  ];

    public function box()
    {
        return $this->belongsTo(Box::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attribute_set()
    {
        return $this->hasOne(AttributeSet::class);
    }
}
