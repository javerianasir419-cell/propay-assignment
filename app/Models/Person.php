<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    // Points explicitly to your custom table
    protected $table = 'people';

    // Tells Laravel to stop looking for created_at and updated_at columns
    public $timestamps = false;
}