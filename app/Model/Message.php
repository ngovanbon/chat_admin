<?php

namespace App\Model;

use Jenssegers\Mongodb\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    public $timestamps = false;
}
