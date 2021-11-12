<?php

namespace App\Console\Commands;

use App\Http\Controllers\CronJobController;
use App\Mail\MailReminder;
use App\Models\Apply;
use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class KenaikanBerkala extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:kenaikanberkala';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command Kenaikan Berkala';

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
                $this->info($data->user->email);
                if($data->applies->where('tipe',1)->count() == 0){
                    $kenaikan = Carbon::parse($data->tmt)->addYear(2)->subDay(7)->format('Y-m-d');
                    if($kenaikan == Carbon::now()->format('Y-m-d')){
                        $this->line('Oke Berkala : ');
                        Apply::create([
                            'kode' => rand(),
                            'tanggal_generate' => Carbon::now()->format('Y-m-d'),
                            'tanggal_kenaikan' => Carbon::now()->addDay(7)->format('Y-m-d'),
                            'tipe' => 1,
                            'aktifya' => 1,
                            'golongan_terakhir' => 1,
                            'pegawai_id' => $data->id
                        ]);
                        Mail::to($data->user->email)->send(new MailReminder($data, 'Berkala', Carbon::now()->addDay(7)->format('Y-m-d')));
                    }else{
                        $this->line('Cannot Create Apply From TMT : '.Carbon::now()->format('Y-m-d').' - '.$kenaikan);
                    }
                }else{
                    $apply = Apply::where('pegawai_id', $data->id)->get()->last();
                    $kenaikan = Carbon::parse($apply->tanggal_kenaikan)->addYear(2)->subDay(7)->format('Y-m-d');
                    if($kenaikan == Carbon::now()->format('Y-m-d')){
                        $this->line('Oke Berkala : ');
                        Apply::create([
                            'kode' => rand(),
                            'tanggal_generate' => Carbon::now()->format('Y-m-d'),
                            'tanggal_kenaikan' => Carbon::now()->addDay(7)->format('Y-m-d'),
                            'tipe' => 1,
                            'aktifya' => 1,
                            'golongan_terakhir' => 1,
                            'pegawai_id' => $data->id
                        ]);
                        Mail::to($data->user->email)->send(new MailReminder($data, 'Berkala', Carbon::now()->addDay(7)->format('Y-m-d')));
                    }else{
                        $this->line('Cannot Create Apply From Tanggal Kenaikan : '.Carbon::now()->format('Y-m-d').' - '.$kenaikan);
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
