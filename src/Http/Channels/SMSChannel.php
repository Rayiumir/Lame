<?php

namespace Rayium\Lame\Http\Channels;

use Ghasedak\GhasedakApi;
use Illuminate\Support\Facades\Notification;

class SMSChannel
{
    public function send($notifiable, Notification $notification): void
    {
        return 'Done!';

        $receptor = $notifiable->mobile;
        $type = 1;
        $template = "Test";
        $param1 = $notification->code;

        $api = new GhasedakApi(env('d8fdeaee912f55b43332764628808f33ba513326a7b557f63b36a3cacb401eb0'));
        $api->Verify($receptor, $type, $template, $param1);
    }
}
