<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Application extends Eloquent
{
    use Notifiable;

    protected $connection = 'mongodb';

    protected $guarded = ['id'];

    /**
     * Route notifications for the mail channel.
     *
     * @return string
     */
    public function routeNotificationForMail()
    {
        return $this->borrower['email'];
    }
}
