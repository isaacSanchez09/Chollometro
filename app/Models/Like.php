<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = 'likes';

    protected $primaryKey = 'id';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function chollo()
    {
        return $this->belongsTo('App\Models\Chollo');
    }

}
