<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'address',
        'condition',
        'description',
        'body',
        'status',
        'everything',
        'from'
    ];

    function getGoogleMapsLinkAttribute()
    {
        $address = urlencode($this->address);
        return "https://www.google.com/maps/search/?api=1&query=$address";
    }
}
