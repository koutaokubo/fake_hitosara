<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address_code',
        'city',
        'address',
        'open_time',
        'close_time',
        'reserve_limit'
    ];

    public function users() {
        return $this->belongsToMany(User::class);
    }
}
