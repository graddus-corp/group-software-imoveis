<?php

namespace GroupSoftware\Http\Controllers;

use \Exception;
use Illuminate\Http\Request;
use GroupSoftware\Helpers\ActionBar;
use GroupSoftware\Services\Interfaces\ImportService;

class ImportController extends Controller {

    private $service;

    public function __construct(ImportService $service) {
        $this->service = $service;
    }

    public function index() {
        return view('import.index');
    }

    public function upload(Request $request) {
        $this->service->import($request->except('_token'));

        ActionBar::create(ActionBar::CSS_SUCCESS, trans('messages.xml_import'));
        return redirect()->route('properties.index');
    }
}
