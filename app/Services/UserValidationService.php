<?php

namespace App\Services;
use Cookie;

class UserValidationService
{
    public static function processChannelAcqusition($channel_acqusition) {
      try {
        Cookie::queue(Cookie::forget('channel_acqusition'));

        $channel_acqusition_str = array();
        $channel_acqusition_str[10] = "direct";
        $channel_acqusition_str[20] = "fb ads";
        $channel_acqusition_str[30] = "fb sharing";
        $channel_acqusition_str[40] = "ig ads";
        $channel_acqusition_str[50] = "ig sharing";
        $channel_acqusition_str[60] = "qoura";
        $channel_acqusition_str[70] = "line sharing";

        if($channel_acqusition_str[$channel_acqusition] == NULL){

          return "unknown channel register";
        }
        else{

          return $channel_acqusition_str[$channel_acqusition];
        }
      }
      catch (\Exception $e) {
          return "unknown bug register";
      }

    }
}
