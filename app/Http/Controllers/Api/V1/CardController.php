<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Trait\ResponseTrait;
use App\Http\Requests\CardRequest;
use App\Http\Resources\CardResource;
use App\Services\CardService;
use Illuminate\Http\Request;

class CardController extends Controller{

    use ResponseTrait;

    protected $cardService;

    public function __construct(CardService $cardService){
        $this->middleware('auth:api');
        $this->cardService = $cardService;
    }

    public function index(){
        //
    }

    public function store(CardRequest $request){
        try{
            $card = $this->cardService->create($request->validated());

            return $this->successResponse(new CardResource($card), 'Card created successfully',
                201);
        }catch (\Exception $e){
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function show($id){
        try{
            $card = $this->cardService->find($id);

            return $this->successResponse(new CardResource($card));
        }catch (\Exception $e){
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function update(CardRequest $request, $id){
        try{
            $card = $this->cardService->update($id, $request->validated());
            $card->load('followers');

            return $this->successResponse(new CardResource($card), 'Card updated successfully');
        }catch (\Exception $e){
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function move(Request $request, $id){
        try{
            $card = $this->cardService->move($id, $request->all());

            return $this->successResponse($card, 'Card moved successfully');
        }catch (\Exception $e){
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function follow($id){
        try{
            $card = $this->cardService->follow($id);

            return $this->successResponse(new CardResource($card));
        }catch (\Exception $e){
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function unfollow($id){
        try{
            $card = $this->cardService->unfollow($id);

            return $this->successResponse(new CardResource($card));
        }catch (\Exception $e){
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function destroy($id){
        try{
            $this->cardService->delete($id);

            return $this->successResponse([], 'Card deleted successfully');
        }catch (\Exception $e){
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function addFollowing(Request $request, $id){
        try{
            $card = $this->cardService->addFollowing($id, $request->all());

            return $this->successResponse(new CardResource($card), 'Following added successfully');
        }catch (\Exception $e){
            return $this->errorResponse($e->getMessage(), 500);
        }
    }
}
