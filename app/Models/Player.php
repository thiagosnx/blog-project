<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Player extends Model
{
    protected $fillable = ['name', 'country'];

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    protected $casts =[
        'titles' => 'array',
        'teams'=> 'array'
    ];

}
