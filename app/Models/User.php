<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use App\Traits\UuidTrait;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, UuidTrait;

    protected $table = 'users';

    protected $guarded = [];

}
