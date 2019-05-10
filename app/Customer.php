<?php

namespace App;

use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @mixin \Eloquent
 * @property int $id
 * @property string $email
 * @property string $name
 * @property string $street
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property boolean $active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Customer extends Model
{
    use FormAccessible;

    /** @var array The attributes that are mass assignable. */
    protected $fillable = ['email', 'name', 'street', 'city', 'state', 'zip', 'active'];

    /** @var array The attributes that should be cast to native types. */
    protected $casts = ['active' => 'boolean'];
}
