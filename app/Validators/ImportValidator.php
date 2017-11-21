<?php

namespace GroupSoftware\Validators;

use GroupSoftware\Validators\BaseValidator;

class ImportValidator extends BaseValidator {
    protected function getCreateRules() {
        return array(
            'xml' => 'required|mimes:xml|max:2048'
        );
    }

    protected function getUpdateRules() {
        return array(
            'xml' => 'required|mimes:xml|max:2048'
        );
    }
}
