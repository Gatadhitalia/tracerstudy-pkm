<?php

namespace App\Console\Commands;

use App\Models\WhatsappLog;
use Helpers\WhatsappHelper;
use Illuminate\Console\Command;

class WhatsappSenderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'whatsapp:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Whatsapp Sender';

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
        $whatsapps = WhatsappLog::where(function ($query) {
            $query->where('status', 'unproccessed')
                ->orWhere('status', 'need_resend')
                ->orWhere('status', 'failed_send');
        })->get();

        foreach ($whatsapps as $whatsapp) {
            try {
                if ($whatsapp->phone_number) {
                    
                    $proccess = WhatsappHelper::message($whatsapp->phone_number, $whatsapp->message);
                    
                    if (isset($proccess['data']['status']) && $proccess['data']['status']) {
                        WhatsappLog::find($whatsapp->id)->update([
                            'status'        => 'success_send'
                        ]);
                    } else {
                        WhatsappLog::find($whatsapp->id)->update([
                            'status'        => 'failed_send',
                            'failed_reason' => json_encode($proccess)
                        ]);
                    }
                }
            } catch (\Throwable $th) {
                WhatsappLog::find($whatsapp->id)->update([
                    'status'        => 'failed_send',
                    'failed_reason' => $th->getMessage()
                ]);
            }

            sleep(rand(5, 20));
        }

        return 0;
    }
}
