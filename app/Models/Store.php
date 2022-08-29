<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Reserve;
use App\Models\Menu;
use App\Models\Holiday;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'genre_id',
        'address_code',
        'area_id',
        'address',
        'open_time',
        'close_time',
        'reserve_limit',
        'holiday_id',
        'user_id',
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
        return $this->hasMany(Menu::class);
    }
    public function area(){
        return $this->belongsTo(Area::class);
    }
    public function genre(){
        return $this->belongsTo(Genre::class);
    }
    
    /**
     * Get the holiday associated with the Store
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function holiday(): HasOne
    {
        return $this->hasOne(Holiday::class);
    }
}
