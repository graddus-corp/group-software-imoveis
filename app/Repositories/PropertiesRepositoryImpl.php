<?php

namespace GroupSoftware\Repositories;

use \DB;
use GroupSoftware\Repositories\BaseRepository;
use GroupSoftware\Models\Property;
use GroupSoftware\Repositories\Interfaces\PropertiesRepository;

class PropertiesRepositoryImpl extends BaseRepository implements PropertiesRepository {

    public function __construct() {
        parent::__construct(Property::class);
    }

    public function getLastId() {
        $tableStatus = DB::select("show table status from group_software where Name = 'properties'");

        return $tableStatus[0]->Auto_increment;
    }

    public function count() {
        return $this->model->count();
    }
}
