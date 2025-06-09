<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // This method defines the structure of our API's JSON output.
        return [
            'id' => $this->book_id,
            'book_title' => $this->title,
            'author_name' => $this->author,
            'current_stock' => $this->stock,
            'last_updated' => $this->updated_at->toDateTimeString(),
        ];
    }
}
