<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cargo extends Model
{
    use HasFactory;

    protected $table = 'cargo';

    protected $fillable = ['id','tipo','url','cedula'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public $timestamps = false;

}
