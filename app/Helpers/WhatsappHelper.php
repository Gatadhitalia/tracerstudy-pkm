<?php

namespace Helpers;

use App\Student;
use App\StudentParent;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsappHelper
{

    public static function http($method, $slug, $data = [], $attach = null)
    {
        $retrying = 0;

        if (config('app.wa_url')) {
            $base_uri = config('app.wa_url');
        } else {
            Log::info('WA URL not found!');
            return false;
        }

        // SET SESSION
        $data['session'] = config('app.wa_key');

        Log::info($data);

        if ($method == 'get') {
            $response = Http::asForm()
                ->withHeaders([
                    
                ])
                ->withOptions(['base_uri' => $base_uri, 'debug' => false])
                ->get("$slug", $data)
                ->json();
        } elseif ($method == 'post') {
            if ($attach === null) {
                $response = Http::asForm()
                    ->withHeaders([
                        
                    ])
                    ->withOptions(['base_uri' => $base_uri, 'debug' => false])
                    ->post("$slug", $data)
                    ->json();
            } else {
                // Log::info(basename($attach));
                $response = Http::attach(
                    "file",
                    $attach,
                    "namafilenya.pdf"
                )
                    ->withHeaders([
                        'partner_key' => 'wa-center'
                    ])
                    ->withOptions(['base_uri' => $base_uri, 'debug' => false])
                    ->post("$slug?key=" . $data['key'], $data)
                    ->json();
            }
        }

        if (isset($response['error']) && $response['error'] === true) {
            Log::info($response);
        }

        return $response;
    }

    public static function number($number)
    {

        $first_number = substr($number, 0, 1);
        
        if ($first_number == "0") {
            return preg_replace('/0/', '62', $number, 1);
        } else {
            return $number;
        }
    }

    public static function id_to_number($id)
    {
        return str_replace('@s.whatsapp.net', '', $id);
    }

    public static function message(string $number, string $message)
    {
        if (config('app.debug')) {
            $message = "*DEBUG ON* \n\n$message";
        }

        $uri = '/send-message';
        $data = [
            'to'     => WhatsappHelper::number($number),
            'text'   => $message
        ];

        $proccess = WhatsappHelper::http('post', $uri, $data);
        
        return $proccess;
    }

}
