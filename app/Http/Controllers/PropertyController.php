<?php

namespace GroupSoftware\Http\Controllers;

use \Exception;
use GroupSoftware\Services\Interfaces\PropertiesService;
use Illuminate\Http\Request;
use GroupSoftware\Helpers\ActionBar;
use GroupSoftware\Models\Property;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class PropertyController extends Controller {

    private $service;

    public function __construct(PropertiesService $service) {
        $this->service = $service;
    }

    public function index() {
        $count = $this->service->count();

        return view('properties.index', array('count' => $count));
    }

    public function ajaxList() {
        if(request()->ajax()) {
            $properties = $this->service->getAll();

            return response()->json(array('data' => $properties), 200);
        }
    }

    public function create() {
        $p = new Property();

        return view('properties.create')->with('p', $p);
    }

    public function update($id) {
        $p = $this->service->get($id);

        return view('properties.create')->with(array('p' => $p, 'update' => true));
    }

    public function store(Request $request) {
        if($request->has('_id'))
            $this->service->update($request->input('_id'), $request->except('_token', '_id'));
        else
            $this->service->create($request->except('_token'));

        ActionBar::create(ActionBar::CSS_SUCCESS, trans('messages.success_store'));
        return redirect()->back();
    }

    public function delete(Request $request) {
        if($request->ajax()) {
            try {
                if($request->has('id')) {
                    $id = $request->input('id');
                    $this->service->delete($id);
                    return response()->json(null, 200);
                }
                else
                    throw new BadRequestHttpException();
            }
            catch(ModelNotFoundException $e) {
                return response()->json(null, 404);
            }
            catch(BadRequestHttpException $e) {
                return response()->json(null, 400);
            }
            catch(Exception $e) {
                return response()->json(null, 500);
            }
        }
    }
}
