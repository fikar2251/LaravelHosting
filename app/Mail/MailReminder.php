<?php

namespace App\Mail;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailReminder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $user;
    private $type;
    private $tanggal;
    public function __construct($user, $type, $tanggal)
    {
        $this->tanggal = $tanggal;
        $this->user = $user;
        $this->type = $type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $logo = Setting::firstOrFail()->logo;
        return $this->from('ichsanarrizqi090@gmail.com')->view('mail.index')->with([
            'pegawai' => $this->user,
            'type' => $this->type,
            'tanggal' => $this->tanggal,
            'logo' => public_path('storage/'.$logo),
            'message' => $this
        ])->subject('Hello '.$this->user->nama);
    }
}
