<?php

namespace App\Http\Traits;


trait TelegramComponents
{
    private function keyboard($option)
    {

        $keyboard = [
            'keyboard' => $option,
            'resize_keyboard'=> true,
            'one_time_keyboard'=> true,
            'selective'=> true,
        ];

        $keyboard = json_encode($keyboard);
        return $keyboard;
    }
}
