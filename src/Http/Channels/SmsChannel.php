<?php

namespace Rayium\Lame\Http\Channels;

use Ghasedak\GhasedakApi;
use Illuminate\Support\Facades\Log;
use Rayium\Lame\Http\Notifications\OTPSms;

class SmsChannel
{
    public function send($notifiable, OTPSms $OTPSms): string
    {
        $receptor = $notifiable->mobile;
        $type = 1;
        $template = "code";
        $param1 = $OTPSms->code;

        $apiKey = env('GHASEDAK_API_KEY');

        if (!$apiKey) {
            Log::error('API key is missing');
            return 'API key is missing';
        }

        try {
            $api = new GhasedakApi($apiKey);
            $response = $api->Verify($receptor, $type, $template, $param1);

            // Check response for errors or restrictions
            if ($response->success) {
                return 'Message sent successfully';
            } else {
                // Log the error for further inspection
                Log::error('SMS sending failed', [
                    'receptor' => $receptor,
                    'response' => $response,
                ]);
                return 'Failed to send message';
            }
        } catch (\Exception $ex) {
            // Log exception details
            Log::error('SMS sending exception', [
                'receptor' => $receptor,
                'exception' => $ex->getMessage(),
            ]);
            return 'Failed to send message due to an exception';
        }
    }

}
