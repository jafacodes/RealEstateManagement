<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bu extends Model
{
    //
    public $table = 'bus';

    protected $fillable = [
        'name', 'price', 'rooms' , 'rent', 'square', 'type', 'small_desc', 'meta', 'longitude', 'latitude', 'large_desc', 'status', 'user_id' , 'place' , 'image'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
}
