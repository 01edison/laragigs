<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// a model is a representation of the table in the database

class Listing extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'company',
        'location',
        'website',
        'email',
        'tags',
        'description'
    ];
}
