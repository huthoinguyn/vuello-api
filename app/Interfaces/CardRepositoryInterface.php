<?php

namespace App\Interfaces;

interface CardRepositoryInterface extends BaseRepositoryInterface{

    public function move(int $id, array $data);

    public function follow(int $id);

    public function unfollow(int $id);

    public function addFollowing(int $id, array $data);
}
