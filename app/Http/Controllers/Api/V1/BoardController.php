<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Trait\ResponseTrait;
use App\Http\Requests\BoardRequest;
use App\Http\Resources\BoardCollection;
use App\Http\Resources\BoardResource;
use App\Services\BoardService;
use Illuminate\Http\Request;

class BoardController extends Controller{

    use ResponseTrait;

    protected $boardService;

    public function __construct(BoardService $boardService){
        $this->middleware('auth:api');
        $this->boardService = $boardService;
    }

    public function index(){
        $boards = $this->boardService->all();

        return $this->successResponse(new BoardCollection($boards));
    }

    public function store(BoardRequest $request){
        try{
            $board = $this->boardService->create($request->validated());

            return $this->successResponse(new BoardResource($board), 'Board created successfully',
                201);
        }catch (\Exception $e){
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function show($board){
        try{
            $board = $this->boardService->find($board);

            return $this->successResponse(new BoardResource($board));
        }catch (\Exception $e){
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function update(Request $request, int $id){
        try{
            $board = $this->boardService->update($id, $request->all());

            return $this->successResponse(new BoardResource($board), 'Board updated successfully');
        }catch (\Exception $e){
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function destroy(int $id){
        try{
            $board = $this->boardService->delete($id);

            return $this->successResponse($board, 'Board deleted successfully');
        }catch (\Exception $e){
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function columns(int $id){
        try{
            $columns = $this->boardService->columns($id);

            return $this->successResponse(new BoardResource($columns));
        }catch (\Exception $e){
            return $this->errorResponse($e->getMessage(), 500);
        }
    }
}
