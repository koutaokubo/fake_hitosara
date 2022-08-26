<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Store;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'charge',
        'course_time'
    ];

    public function getStore() {
        return $this->belongsTo(Store::class);
    }
}
