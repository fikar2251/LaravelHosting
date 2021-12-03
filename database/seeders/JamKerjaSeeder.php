<?php

namespace Database\Seeders;

use App\Models\Jam;
use Illuminate\Database\Seeder;

class JamKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jam = [
            [
                'keterangan' => 'Masuk',
                'mulai' => '09:00:00',
                'selesai' => '09:15:00'
            ],
            [
                'keterangan' => 'Pulang',
                'mulai' => '17:00:00',
                'selesai' => '17:15:00'
            ]
        ];
        foreach ($jam as $data) {
            Jam::create($data);
        }
    }
}
