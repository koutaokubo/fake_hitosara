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

    function isOpenMonday(){
		return $this->monday == Holiday::OPEN;
	}
	function isOpenTuesday(){
		return $this->tuesday == Holiday::OPEN;
	}
	function isOpenWednesday(){
		return $this->wednesday == Holiday::OPEN;
	}
	function isOpenThursday(){
		return $this->thursday == Holiday::OPEN;
	}
	function isOpenFriday(){
		return $this->friday == Holiday::OPEN;
	}
	function isOpenSaturday(){
		return $this->saturday == Holiday::OPEN;
	}
	function isOpenSunday(){
		return $this->sunday == Holiday::OPEN;
	}
	function isCloseMonday(){
		return $this->monday == Holiday::CLOSE;
	}
	function isCloseTuesday(){
		return $this->tuesday == Holiday::CLOSE;
	}
	function isCloseWednesday(){
		return $this->wednesday == Holiday::CLOSE;
	}
	function isCloseThursday(){
		return $this->thursday == Holiday::CLOSE;
	}
	function isCloseFriday(){
		return $this->friday == Holiday::CLOSE;
	}
	function isCloseSaturday(){
		return $this->saturday == Holiday::CLOSE;
	}
	function isCloseSunday(){
		return $this->sunday == Holiday::CLOSE;
	}
}
