<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id'=>$this->id,
            'slug'=>$this->slug,
            'title'=>$this->title,
         'body'=>$this->body,
         'created_at'=>(string)$this->created_at,//to make it on form of non opject 
         'updated_at'=>$this->updated_at,
         //'user'=>$this->user,//هيجيب كل اللي في اليوزر انا عملت ريسورس تاني علشان اتحكم في اللي هيتعرض
         'user'=>new UserResource($this->user),
         'tags'=>$this->tags
        ];
        //return parent::toArray($request);
    }
}
