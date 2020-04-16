<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoodRelation extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'food_id',  'user_id','food_specific_value_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function Food()
    {
        return $this->belongsTo('App\Food');
    }

    public function FoodSpecificValue()
    {
        return $this->belongsTo('App\FoodSpecificValue');
    }
}
