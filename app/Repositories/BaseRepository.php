<?php

namespace GroupSoftware\Repositories;

abstract class BaseRepository {

    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    public function __construct($model) {
        $this->model = new $model();
    }

    public function find($id) {
        return $this->model->findOrFail($id);
    }

    public function findAll() {
        return $this->model->all();
    }

    public function create(array $data) {
        return $this->model->create($data);
    }

    public function insert(array $multipleData) {
        return $this->model->insert($multipleData);
    }

    public function update(array $data, $id) {
        return $this->model->findOrFail($id)->update($data);
    }

    public function delete($id) {
        return $this->model->findOrFail($id)->delete();
    }
}
