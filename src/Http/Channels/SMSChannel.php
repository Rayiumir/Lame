<?php

namespace Rayium\Lame\Http\Channels;

use Ghasedak\GhasedakApi;
use Illuminate\Support\Facades\Notification;

class SMSChannel
{
    public function send($notifiable, Notification $notification): void
    {
        $receptor = $notifiable->mobile;
        $type = 1;
        $template = "Test";
        $param1 = $notification->code;

        $api = new GhasedakApi(env('GHASEDAK_API_KEY'));
        $api->Verify($receptor, $type, $template, $param1);
    }
}
