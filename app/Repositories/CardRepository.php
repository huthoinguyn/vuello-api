<?php

namespace App\Repositories;

use App\Interfaces\CardRepositoryInterface;
use App\Models\Card;

class CardRepository extends BaseRepository implements CardRepositoryInterface{

    public function __construct(Card $model){
        parent::__construct($model);
    }

    public function move(int $id, array $data){
        $card            = Card::find($id);
        $card->column_id = $data['column_id'];
        $card->position  = $data['position'];
        $card->save();
        $card->load('followers');

        return $card;
    }

    public function follow(int $id){
        $card = Card::find($id);
        $card->followers()->attach(auth()->id());
        $card->load('followers');

        return $card;
    }

    public function unfollow(int $id){
        $card = Card::find($id);
        $card->followers()->detach(auth()->id());
        $card->load('followers');

        return $card;
    }

    public function addFollowing(int $id, array $data){
        $card = Card::find($id);
        $card->followers()->sync($data['user_ids']);
        $card->load('followers');

        return $card;
    }
}
