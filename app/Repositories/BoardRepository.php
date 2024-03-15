<?php

namespace App\Repositories;

use App\Interfaces\BoardRepositoryInterface;
use App\Models\Board;

class BoardRepository extends BaseRepository implements BoardRepositoryInterface{

    public function __construct(Board $model){
        parent::__construct($model);
    }

    public function columns(int $id){
        $board = Board::with(['columns' => function ($query){
            $query->orderBy('position', 'asc'); // Order columns by position ASC
            $query->with(['cards' => function ($query){
                $query->orderBy('position',
                    'asc'); // Order cards by position ASC within each column
                $query->with(['createdBy', 'assignedTo', 'followers' => function ($query){
                    $query->select('users.id', 'name');
                }]);
            }]);
        }, 'owner'])->find($id);

        return $board;
    }
}
