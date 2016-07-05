<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Message extends Model
{
    protected $table = 'messenger';

    protected $fillable = ['user_id', 'message', 'createdAt'];

    public $timestamps = false;

    public $dates = ['createdAt'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y H:i:s');
    }
}
