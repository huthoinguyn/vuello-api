<?php

namespace App\Interfaces;

interface BoardRepositoryInterface extends BaseRepositoryInterface{

    public function columns(int $id);
}
