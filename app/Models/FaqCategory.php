<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class FaqCategory extends Model
{
    protected $fillable = [
        'name',
        'order',
    ];

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }
}
