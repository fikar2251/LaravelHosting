<?php

namespace Database\Seeders;

use App\Models\MstPenerimaan;
use App\Models\MstPotongan;
use Illuminate\Database\Seeder;

class PenerimaanPotonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $penerimaan = [
            [
                'nama' => 'gaji pokok'
            ],
            [
                'nama' => 'tujangan'
            ],
            [
                'nama' => 'lembur'
            ],
            [
                'nama' => 'transport'
            ],
            [
                'nama' => 'uang makan'
            ],
            [
                'nama' => 'bonus'
            ]
        ];
        $potongan = [
            [
                'nama' => 'tunjangan jabatan'
            ],
            [
                'nama' => 'BPJS'
            ],
            [
                'nama' => 'JHT'
            ],
            [
                'nama' => 'JKK'
            ],
            [
                'nama' => 'JPN'
            ],
            [
                'nama' => 'PPN'
            ]
        ];
        foreach ($penerimaan as $terima) {
            MstPenerimaan::create($terima);
        }
        foreach ($potongan as $potong) {
            MstPotongan::create($potong);
        }
    }
}
