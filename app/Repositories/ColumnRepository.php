<?php

namespace App\Repositories;

use App\Interfaces\ColumnRepositoryInterface;
use App\Models\Column;

class ColumnRepository extends BaseRepository implements ColumnRepositoryInterface{

    public function __construct(Column $model){
        parent::__construct($model);
    }

    public function board(int $id){
        $board = $this->model->find($id)->board()->get();

        return $board;
    }
}
