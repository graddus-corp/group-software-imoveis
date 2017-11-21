<?php

namespace GroupSoftware\Services;

use GroupSoftware\Repositories\Interfaces\PropertiesRepository;
use GroupSoftware\Services\Interfaces\PropertiesService;
use GroupSoftware\Validators\PropertyValidator;

class PropertiesServiceImpl implements PropertiesService {

    private $repository;

    public function __construct(PropertiesRepository $repository) {
        $this->repository = $repository;
    }

    public function getAll() {
        return $this->repository->findAll();
    }

    public function count() {
        return $this->repository->count();
    }

    public function get($id) {
        return $this->repository->find($id);
    }

    public function create(array $request) {
        (new PropertyValidator($request))->create();

        $code = 'IMOVEL'.$this->repository->getLastId();
        $request['code'] = $code;
        $this->repository->create($request);
    }

    public function update($id, array $request) {
        (new PropertyValidator($request))->update();
        $this->repository->update($request, $id);
    }

    public function delete($id) {
        $this->repository->delete($id);
    }
}
