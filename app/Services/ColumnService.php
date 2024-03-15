<?php

namespace App\Services;

use App\Interfaces\ColumnRepositoryInterface;

class ColumnService extends BaseService{

    protected $columnRepository;

    public function __construct(ColumnRepositoryInterface $columnRepository){
        parent::__construct($columnRepository);
        $this->columnRepository = $columnRepository;
    }

    public function board(int $id){
        return $this->columnRepository->board($id);
    }
}
