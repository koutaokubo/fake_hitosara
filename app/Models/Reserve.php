<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
use App\Models\User;
use App\Models\Store;

class Reserve extends Model
{
    use HasFactory;

    protected $fillable = [
        'reserve_date',
        'store_id',
        'user_id',
        'menu_id',
    ];

    public function getReserveUser() {
        return $this->hasOne(User::class);
    }

    public function getReserveStore() {
        return $this->hasOne(Store::class);
    }

    public function getReserveMenu() {
        return $this->belongsToMany(Menu::class);
    }
}
