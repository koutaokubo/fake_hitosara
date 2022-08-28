<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Store;

class Holiday extends Model
{
    use HasFactory;

    protected $fillable = [
        'sunday',
        'monday',
        'tuesday',
        'tursday',
        'wednesday',
        'friday',
        'saturday'
    ];

    /**
     * Get the store that owns the Holiday
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }
}
