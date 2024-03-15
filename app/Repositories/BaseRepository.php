<?php

namespace App\Repositories;

use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface{

    protected $model;

    public function __construct(Model $model){
        $this->model = new $model;
    }

    public function all(){
        return $this->model->all();
    }

    public function create(array $data){
        return $this->model->create($data);
    }

    public function find(int $id){
        return $this->model->find($id);
    }

    public function update(int $id, array $data){
        $model = $this->find($id);
        $model->update($data);

        return $model;
    }

    public function delete(int $id){
        return $this->find($id)->delete();
    }
}
