<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
   public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name?$this->name:"",
            'avatar'=>$this->avatar?url('/public/storage/'.$this->avatar):'',
            'email'=>$this->email?$this->email:"",
            'phone'=>$this->phone,
            'phone_verified'=>$this->phone_verified?$this->phone_verified:0,
            'type'=>$this->type,
            'address' => $this->address?$this->address:"",
            'point' =>$this->point,
            'login'=>$this->login,
            'approve'=>$this->approve,
            'valid_to'=> $this->valid_to,
            'provider'=> $this->provider,
            'provider_id'=> $this->provider_id,

        ];
    }
}
