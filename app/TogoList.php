<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TogoList extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'latitude', 'longitude', 'visited'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'togo_list';
}
