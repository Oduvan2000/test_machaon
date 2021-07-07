<?php

function config($optionName, $defaultValue = null)
{

    $optionName = explode(".", $optionName);

    $setting = require "setting.php";

    foreach ($optionName as $option) {
        $setting = $setting[$option];

        if ($setting === null) {
            if ($defaultValue === null) {
                throw new Exception('The option was not found');
            } else {
                return $defaultValue;
            }
        }
    }

    return $setting;
}

$optionName = "assets.test";

try {
    var_dump(config($optionName));
} catch (Exception $e) {
    echo $e;
}
