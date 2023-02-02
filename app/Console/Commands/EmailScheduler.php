<?php

namespace App\Console\Commands;

use App\Mail\TommorowAds;
use App\Models\Advertiser;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class EmailScheduler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'advertiser:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $advertisers = Advertiser::whereHas('ads', function ($query) {
            $query->where('start_date', Carbon::tomorrow());
        })->get();
        foreach ($advertisers as $advertiser) {
            Mail::to($advertiser->email)->send(new TommorowAds($advertiser));
        }
    }
}
