<?php

namespace GroupSoftware\Validators;

use GroupSoftware\Validators\BaseValidator;

class PropertyValidator extends BaseValidator {

    protected function getCreateRules() {
        return array(
            'type' => 'required|max:50',
            'property' => 'required|max:255',
            'zipcode' => 'required|max:9',
            'street' => 'required|max:255',
            'number' => 'required|max:255',
            'complement' => 'max:255',
            'neighborhood' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'sale_price' => 'required|numeric',
            'rental_price' => 'required|numeric',
            'seasonal_rental_price' => 'required|numeric',
            'area' => 'required|numeric',
            'bedrooms' => 'required|integer',
            'suites' => 'required|integer',
            'bathrooms' => 'required|integer',
            'rooms' => 'required|integer',
            'garage' => 'required|integer',
            'description' => 'required',
        );
    }

    protected function getUpdateRules() {
        return array(
            'type' => 'required|max:50',
            'property' => 'required|max:255',
            'zipcode' => 'required|max:9',
            'street' => 'required|max:255',
            'number' => 'required|max:255',
            'complement' => 'max:255',
            'neighborhood' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'sale_price' => 'required|numeric',
            'rental_price' => 'required|numeric',
            'seasonal_rental_price' => 'required|numeric',
            'area' => 'required|numeric',
            'bedrooms' => 'required|integer',
            'suites' => 'required|integer',
            'bathrooms' => 'required|integer',
            'rooms' => 'required|integer',
            'garage' => 'required|integer',
            'description' => 'required',
        );
    }
}
