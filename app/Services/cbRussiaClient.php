<?php

namespace Services;

class cbRussiaClient
{
    public function cbRussia()
    {
        $file = simplexml_load_file("http://www.cbr.ru/scripts/XML_daily.asp?date_req=" . date("d/m/Y"));

        $valutes = [];

        foreach ($file as $el) {
            $valutes[strval($el->CharCode)] = strval($el->Value);
        }

        return $valutes;

    }
}