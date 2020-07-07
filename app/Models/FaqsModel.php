<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqsModel extends Model
{
    protected $table = 'faqs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'content',
        'photo',
        'created_by',
    ];
}
