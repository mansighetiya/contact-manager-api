<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Contact
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 */
class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone'];
}
