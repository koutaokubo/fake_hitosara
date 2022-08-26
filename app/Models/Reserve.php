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
        'reserve_time',
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

    public function getCurrentReserveNumber(int $store_id, String $reserve_date): int
    {
        return Reserve::where('store_id', $store_id)->where('reserve_date', $reserve_date)->count();
    }
}
