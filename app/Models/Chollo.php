<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chollo extends Model
{
    use HasFactory;

    protected $table = 'Gangas';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'title',
        'description',
        'url',
        'category',
        'price',
        'price_sale'
    ];

    public function getRatedAttribute()
    {
        if(($this->likes - $this->unlikes) == 0){
            return 0;
        }
        return (($this->likes - $this->unliles)/($this->likes + $this->unlikes)) * 100;
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comentari()
    {
        return $this->hasMany('App\Models\Comentari');
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Likes');
    }

}
