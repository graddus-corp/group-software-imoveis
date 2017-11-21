<?php

namespace GroupSoftware\Repositories\Interfaces;

interface PropertiesRepository {

    public function find($id);
    public function findAll();
    public function create(array $data);
    public function insert(array $multipleData);
    public function update(array $data, $id);
    public function delete($id);
    public function getLastId();
    public function count();
}
