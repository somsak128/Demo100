<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tree extends Model
{
    use HasFactory;

    protected $fillable = [
        'Tree_name',
        'Tree_mean',
        'Tree_Feature',
        'Tree_PT',
    ];
}