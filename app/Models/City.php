<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Email;
use App\Models\WebAddress;

class City extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subdistrict_id',
        'name',
        'mayor_name',
        'city_hall_address',
        'phone',
        'fax',
        'img_path'
    ];

    public function emails()
    {
        return $this->hasMany(Email::class);
    }

    public function webAddresses()
    {
        return $this->hasMany(WebAddress::class);
    }
}
