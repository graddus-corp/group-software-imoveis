<?php

namespace GroupSoftware\Services\Interfaces;

interface PropertiesService {

    public function count();
    public function getAll();
    public function get($id);
    public function create(array $request);
    public function update($id, array $request);
    public function delete($id);

}
