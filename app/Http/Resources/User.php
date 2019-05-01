<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) //define data to use in otherserver
    {
        return[
            'name' => $this->name,
        'email' => $this->email,
            'role' => $this->role,
            'create_at' =>  $this->created_at->format('Y-m-d H:i:s')
        ];
    }


    public function with($request){
        return [
            'status' => 'success'
        ];
    }
}
