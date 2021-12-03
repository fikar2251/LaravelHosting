<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SuratMasukResource extends JsonResource
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
            'id' => $this->id,
            'asal' => $this->asal,
            'nomor' => $this->nomor,
            'ringkas' => $this->ringkas,
            'index' => $this->index,
            'tanggal' => Carbon::parse($this->tanggal)->format('d F Y'),
            'keterangan' => $this->keterangan,
            'file' => asset('storage/'.$this->file),
            'klasifikasi' => new KlasifikasiResource($this->klasifikasi)
        ];
    }
}
