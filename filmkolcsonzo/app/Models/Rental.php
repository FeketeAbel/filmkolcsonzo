<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rental extends Model
{
    use SoftDeletes;

    protected $fillable = ['movie_id', 'renter_name', 'rent_date', 'return_date'];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}

