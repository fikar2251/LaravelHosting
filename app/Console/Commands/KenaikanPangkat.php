<?php

namespace App\Console\Commands;

use App\Http\Controllers\CronJobController;
use App\Mail\MailReminder;
use App\Models\Apply;
use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class KenaikanPangkat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:kenaikanpangkat';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command Kenaikan Pangkat';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $this->line('Display this on the screen');
            $now = Carbon::now()->addDay(7)->format('Y-m-d');
            $pegawai = Pegawai::get();
            foreach($pegawai as $data){
                if($data->applies->where('tipe',2)->count() == 0){
                    $kenaikan = Carbon::parse($data->tmt)->addYear(4)->subDay(7)->format('Y-m-d');
                    if($kenaikan == Carbon::now()->format('Y-m-d')){
                        $this->line('Oke Pangkat');
                        Apply::create([
                            'kode' => rand(),
                            'tanggal_generate' => Carbon::now()->format('Y-m-d'),
                            'tanggal_kenaikan' => Carbon::now()->addDay(7)->format('Y-m-d'),
                            'tipe' => 2,
                            'aktifya' => 1,
                            'golongan_terakhir' => 1,
                            'pegawai_id' => $data->id
                        ]);
                        Mail::to($data->user->email)->send(new MailReminder($data, 'Pangkat', Carbon::now()->addDay(7)->format('Y-m-d')));
                    }else{
                        $this->line('Cannot Create Apply From TMT : '.$kenaikan.' - '.Carbon::now()->format('Y-m-d'));
                    }
                }else{
                    $apply = Apply::where('pegawai_id', $data->id)->get()->last();
                    $kenaikan = Carbon::parse($apply->tanggal_kenaikan)->addYear(4)->subDay(7)->format('Y-m-d');
                    if($kenaikan == Carbon::now()->format('Y-m-d')){
                        $this->line('Oke Pangkat');
                        Apply::create([
                            'kode' => rand(),
                            'tanggal_generate' => Carbon::now()->format('Y-m-d'),
                            'tanggal_kenaikan' => Carbon::now()->addDay(7)->format('Y-m-d'),
                            'tipe' => 2,
                            'aktifya' => 1,
                            'golongan_terakhir' => 1,
                            'pegawai_id' => $data->id
                        ]);
                        Mail::to($data->user->email)->send(new MailReminder($data, 'Pangkat', Carbon::now()->addDay(7)->format('Y-m-d')));
                    }else{
                        $this->line('Cannot Create Apply From Tanggal Kenaikan : '.$kenaikan.' - '.Carbon::now()->format('Y-m-d'));
                    }
                }
            }
            $this->info('The command was successful!');
        } catch (\Throwable $th) {
            $this->error('Something went wrong! : '.$th->getMessage());
        }
        return Command::SUCCESS;
    }
}
