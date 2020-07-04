<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    public $timestamps = true;
    protected $table = 'team_member';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'memFname',
        'memLname',
        'memBio',
        'memPic',
        'memPosition',
        'memFile',
        'created_by',
    ];
}
