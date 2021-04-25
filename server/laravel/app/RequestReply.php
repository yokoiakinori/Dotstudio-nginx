<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestReply extends Model
{
    protected $guarded = array(
        'id',
        'user_id'
    );

    protected $visible = [
        'id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function materialrequest()
    {
        return $this->belongsTo('App\MaterialRequest', 'request_id');
    }
}
