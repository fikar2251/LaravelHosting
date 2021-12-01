<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class DisposisiResource extends JsonResource
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
            'tujuan' => $this->tujuan,
            'isi' => $this->isi,
            'batas_waktu' => Carbon::parse($this->batas_waktu)->format('d F Y'),
            'catatan' => $this->catatan,
            'tipe' => $this->tipe,
            'is_read' => $this->is_read,
            'surat_masuk_id' => $this->surat_masuk_id,
            'pegawai_id' => $this->pegawai_id,
            'surat_masuk' => new SuratMasukResource($this->surat_masuk),
            'response' => $this->response
        ];
    }
}
