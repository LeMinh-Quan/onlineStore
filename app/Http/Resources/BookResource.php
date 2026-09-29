<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'ma_sach' => $this->id,
            'tieu_de' => $this->title,
            'tac_gia' => $this->author,
            'gia_ban' => $this->price,
            'trang_thai' => $this->is_published ? 'Đang bán' : 'Ngừng bán',
            'ngay_nhap' => $this->created_at?->format('d/m/Y'),
        ];
    }
}
