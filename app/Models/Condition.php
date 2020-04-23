<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;



class Condition extends Model
{
    protected $table = 'conditions';

    protected $fillable = ['name', 'above', 'belove', 'equal'];

    protected $hidden = [
    ];

    public $timestamps = false;


}