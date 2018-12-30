<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $table = 'user_log';

    protected $fillable = ['user_id', 'checkin_at', 'checkout_at'];

    protected $datecheckin = ['checkin_at'];

    protected $datecheckout = ['checkout_at'];
}
