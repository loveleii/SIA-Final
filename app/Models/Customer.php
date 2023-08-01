<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'location', 'phone', 'stylist', 'price', 'adate', 'email', 'pic'];

    protected $casts = [
        'adate' => 'date'
    ];

    protected $appends = ['formattedADate','adate2', 'pic_url'];

    public function getFormattedADateAttribute() {
        return $this->adate->format('F d, Y');
    }

    public function getAdate2Attribute() {
        return $this->adate->format('Y-m-d');
    }

    public function getPicUrlAttribute() {
        $url = $this->pic ? asset('uploads/pic/' . $this->pic) : "https://i.pinimg.com/originals/4e/c7/37/4ec737d661f71dab0dca8dd84d8af983.jpg";
        return $url;
    }
}
