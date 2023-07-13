<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'user' => $this->user,
            'user_favorites_books' => $this->user_favorites_books,
            'user_wish_books' => $this->user_wish_books,
            'book_id' => $this->book_id,
            'stop_id' => $this->stop_id,
        ];
    }
}
