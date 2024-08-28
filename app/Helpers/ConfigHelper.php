<?php

namespace App\Helpers;

use App\Models\Configuration;

class ConfigHelper
{

    public static function getAppName()
    {
        $appName = Configuration::where('type', 'APP_NAME')->value('value');
        return $appName;
    }

    function formatDate($date = '', $format = 'd-m-Y'){
        if($date == '' || $date == null)
            return;
    
        return date($format,strtotime($date));
    }
}