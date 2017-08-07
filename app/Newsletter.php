<?php

namespace App;

/**
 * @property string $email
 */
class Newsletter extends \Illuminate\Database\Eloquent\Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    
    protected $dates = ['deleted_at'];
}
