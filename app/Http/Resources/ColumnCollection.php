<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ColumnCollection extends ResourceCollection{

    /**
     * Transform the resource collection into an array.
     *
     * @return <int|string, mixed>
     */
    public function toArray(Request $request){
        return ColumnResource::collection($this->collection);
    }
}
