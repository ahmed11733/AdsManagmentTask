<?php

namespace App\Mail;
use Illuminate\Support\Facades\Mail;
use App\Models\Advertiser;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TommorowAds extends Mailable
{
    use Queueable, SerializesModels;

    public $advertiser;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Advertiser  $advertiser)
    {
        $this->advertiser = $advertiser;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('2grand@gmail.com', 'Ad Reminder')
                ->view('emails.email');
    }
}
