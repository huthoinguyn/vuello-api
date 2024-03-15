<?php

namespace App\Services;

use App\Interfaces\BoardRepositoryInterface;

class BoardService extends BaseService{

    protected $repository;

    public function __construct(BoardRepositoryInterface $repository){
        parent::__construct($repository);
        $this->repository = $repository;
    }

    public function columns(int $id){
        return $this->repository->columns($id);
    }
}
