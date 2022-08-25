<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Reserve;
use App\Models\Menu;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'open_time'
    ];

    protected $casts = [
        'holiday' => 'array'
    ];

    public function favoriteUsers() {
        return $this->belongsToMany(User::class, 'favorite');
    }

    public function isFavoritedBy(User $user): bool
    {
        return $user
            ? (bool)$this->favoriteUsers->where('user_id')->count()
            : false;
    }

    public function getReserveList() {
        return $this->belongsToMany(Reserve::class);
    }

    public function getMenuList() {
        return $this->belongsToMany(Menu::class);
    }
}
