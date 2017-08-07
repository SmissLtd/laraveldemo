<?php

namespace App;

/**
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $message
 * @property enum $status
 * @property integer $user_id
 * 
 * @property-read App\User $user
 */
class Contact extends \Illuminate\Database\Eloquent\Model
{
    const STATUS_NEW = 'new';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_REPLIED = 'replied';
    
    use \Illuminate\Database\Eloquent\SoftDeletes;
    
    protected $dates = ['deleted_at'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
