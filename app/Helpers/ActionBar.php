<?php

namespace GroupSoftware\Helpers;

use Illuminate\Support\Facades\Session;

abstract class ActionBar {

    const CSS_ERRORS = 'danger';
    const CSS_WARNING = 'warning';
    const CSS_INFO = 'info';
    const CSS_SUCCESS = 'success';

    public static function create($status, $message) {
        $actionBar = [
            'css' => strtolower($status),
            'message' => $message
        ];

        Session::flash('actionBar', $actionBar);
    }
}
