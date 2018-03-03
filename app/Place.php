<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'latitude',
        'longitude',
        'visited',
        'country',
        'city',
        'address'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'togo_list';
}
