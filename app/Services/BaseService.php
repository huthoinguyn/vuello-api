<?php

namespace App\Services;

use App\Interfaces\BaseRepositoryInterface;

class BaseService{

    protected $repository;

    public function __construct(BaseRepositoryInterface $repository){
        $this->repository = $repository;
    }

    public function all(){
        return $this->repository->all();
    }

    public function create(array $data){
        return $this->repository->create($data);
    }

    public function find(int $id){
        return $this->repository->find($id);
    }

    public function update(int $id, array $data){
        return $this->repository->update($id, $data);
    }

    public function delete(int $id){
        return $this->repository->delete($id);
    }
}
