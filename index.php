<?php

/**
 * Эта функция возвращает значения настроек из файла setting.php
 *
 * @author Ivan Shumilov
 *
 * @param string $optionName Путь к значению
 * @param string|null $defaultValue Возвратит в случае отсутсвия настройки по указанному пути
 * @return mixed
 */

function config($optionName, $defaultValue = null)
{

    $optionName = explode(".", $optionName);

    $setting = (object)require $_SERVER['DOCUMENT_ROOT'] . "/setting.php";

    foreach ($optionName as $option) {
        $setting = (object)$setting->$option;

        if ($setting == new stdClass) {
            if ($defaultValue === null) {
                throw new Exception('The option was not found');
            } else {
                return $defaultValue;
            }
        }
    }

    return $setting->scalar;
}
