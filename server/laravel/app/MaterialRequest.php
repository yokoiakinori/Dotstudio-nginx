<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class MaterialRequest extends Model
{
    protected $guarded = array(
        'id',
        'user_id'
    );

    protected $visible = [
        'id', 'title', 'contents', 'iscompleted', 'user_id', 'user'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
