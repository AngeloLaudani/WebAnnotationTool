<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeSet extends Model
{
  protected $fillable = [
  'annotation_id', 'attribute_name', 'value_name'
];

    public function annotation()
    {
        return $this->belongsTo(Annotation::class);
    }
}
