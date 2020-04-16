<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KarmaSpecificValue extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',  'user_id', 'karma_id',  'Enerji', 'Km', 'Hp', 'Lif', 'Kul', 'Karbonhidrat', 'Kalsiyum',
        'Fosfor', 'Ca_p', 'Meganizyum', 'Sodyum', 'Taurin', 'Yag', 'LinoliekAsit', 'Fiyat'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function Karma()
    {
        return $this->belongsTo('App\Karma');
    }
}
