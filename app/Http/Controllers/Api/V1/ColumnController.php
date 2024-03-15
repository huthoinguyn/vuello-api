<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Trait\ResponseTrait;
use App\Http\Requests\ColumnRequest;
use App\Services\ColumnService;

class ColumnController extends Controller{

    use ResponseTrait;

    protected $columnService;

    public function __construct(ColumnService $columnService){
        $this->middleware('auth:api');
        $this->columnService = $columnService;
    }

    public function index(){
        //
    }

    public function store(ColumnRequest $request){
        try{
            $column = $this->columnService->create($request->validated());

            return $this->successResponse($column, 'Column created successfully', 201);
        }catch (\Exception $e){
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function destroy($id){
        try{
            $column = $this->columnService->delete($id);

            return $this->successResponse($column, 'Column deleted successfully');
        }catch (\Exception $e){
            return $this->errorResponse($e->getMessage(), 500);
        }
    }
}
