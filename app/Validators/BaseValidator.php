<?php

namespace GroupSoftware\Validators;

use GroupSoftware\Helpers\ActionBar;
use Illuminate\Support\Facades\Validator;

abstract class BaseValidator
{
    private $request;
    private $routeErrors;

    public function __construct(array $request, $routeErrors = null) {
        $this->request = $request;
        $this->routeErrors = $routeErrors;

        return $this;
    }

    public function create() {
        $validator = Validator::make($this->request, $this->getCreateRules());

        $this->check($validator);
    }

    public function update() {
        $validator = Validator::make($this->request, $this->getUpdateRules());

        $this->check($validator);
    }

    private function check($validator) {
        if($validator->fails()) {
            ActionBar::create(ActionBar::CSS_ERRORS, trans('messages.validation_errors'));

            if(is_null($this->routeErrors) || empty($this->routeErrors))
                redirect()->back()->withErrors($validator)->withInput($this->request)->send();

            redirect()->route($this->routeErrors)->withErrors($validator)->withInput($this->request)->send();
        }
    }

    protected abstract function getCreateRules();

    protected abstract function getUpdateRules();
}
