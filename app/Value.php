<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    protected $fillable = ['value_name', 'sample_path', 'sample_description'];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
