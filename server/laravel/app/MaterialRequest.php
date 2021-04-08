<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialRequest extends Model
{
    protected $guarded = array(
        'id',
        'user_id'
    );

    protected $visible = [
        'title', 'content', 'iscompleted', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
