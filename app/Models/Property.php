<?php

namespace GroupSoftware\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model {

    protected $table = 'properties';
    protected $primaryKey = 'id';
    protected $fillable = [
        'code', 'type', 'property', 'zipcode', 'street', 'number', 'complement', 'neighborhood', 'city', 'state',
        'sale_price', 'rental_price', 'seasonal_rental_price', 'area', 'bedrooms', 'suites', 'bathrooms', 'rooms',
        'garage', 'description', 'image'
    ];
}
