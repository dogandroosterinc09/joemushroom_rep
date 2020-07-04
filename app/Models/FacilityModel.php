<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacilityModel extends Model
{
    protected $table = 'facility';

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
