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
        'area_id',
        'genre_id',
        'city',
        'address',
        'open_time',
        'close_time',
        'reserve_limit'
    ];

    public function favoriteUsers() {
        return $this->belongsToMany(User::class);
    }
    public function area(){
        return $this->belongsTo(Area::class);
    }
    public function genre(){
        return $this->belongsTo(Genre::class);
    }
}
