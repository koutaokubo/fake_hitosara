<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Store;

class Holiday extends Model
{

    const OPEN = 1;
    const CLOSE = 2;
    
    use HasFactory;

    protected $fillable = [
        'sunday',
        'monday',
        'tuesday',
        'thursday',
        'wednesday',
        'friday',
        'saturday',
		'store_id'
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

	public function getHolidays() {
		return $holidays = array(
			"日曜日" => $this->sunday,
			"月曜日" => $this->monday,
			"火曜日" => $this->tuesday,
			"水曜日" => $this->wednesday,
			"木曜日" => $this->thursday,
			"金曜日" => $this->friday,
			"土曜日" => $this->saturday
		);
	}
}
