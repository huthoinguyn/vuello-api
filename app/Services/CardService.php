<?php

namespace App\Services;

use App\Interfaces\CardRepositoryInterface;
use App\Mail\MovingCardMail;
use App\Models\Column;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class CardService extends BaseService{

    protected $cardRepository;

    public function __construct(CardRepositoryInterface $cardRepository){
        parent::__construct($cardRepository);
        $this->cardRepository = $cardRepository;
    }

    public function move(int $id, array $data){
        $card = $this->cardRepository->move($id, $data);

        $followers = $card->followers;

        foreach ($followers as $follower){
            Mail::to($follower->email)->send(new MovingCardMail($card,
                Column::find($data['column_id']), User::find($follower->id)));
        }

        return $card;
    }

    public function follow(int $id){
        $card = $this->cardRepository->follow($id);

        return $card;
    }

    public function unfollow(int $id){
        $card = $this->cardRepository->unfollow($id);

        return $card;
    }

    public function addFollowing(int $id, array $data){
        $card = $this->cardRepository->addFollowing($id, $data);

        return $card;
    }
}
