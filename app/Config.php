<?php
/**
 * Created by PhpStorm.
 * User: Lusienne
 * Date: 14.10.2016
 * Time: 16:00
 */

namespace App;

/**
 * Class Config
 * @package App
 * Проверяем конфиг. файл .env и его свойства добавляем в $_ENV
 */
class Config
{

    public function __construct()
    {
        $this->getProperties();
    }

    protected function getProperties()
    {
        $result = file(__DIR__ . '/../.env', FILE_SKIP_EMPTY_LINES);
        foreach ($result as $value) {
            $item = explode("=", $value, 2);
            $_ENV[trim($item[0])] = trim($item[1]);
        }

    }

}