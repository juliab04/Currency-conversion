<?php

namespace Services;
class ConvectorService
{

    public function __construct()
    {
        $this->cbRussiaClient = new cbRussiaClient();
        $this->cbThailandClient = new cbThailandClient();
    }

    public function conversion(string $fromCurrency, string $toCurrency, int $quantity)
    {

        if ($toCurrency === "RUB") {

            $valutes = $this->cbRussiaClient->cbRussia();

            $num = (float)str_replace(",", ".", $valutes[$fromCurrency]);

            $result = $num * $quantity;

            $conclusion = "$quantity $fromCurrency = $result $toCurrency";
            require_once './../public/Views/response.phtml';
        }


        if ($toCurrency === "THB") {

            $response = $this->cbThailandClient->cbThailand($fromCurrency);

            $arr = json_decode($response, true);

            $valutes = $arr['result']['data']['data_detail'][0]['selling'];

            $result = $valutes * $quantity;

            $conclusion = "$quantity $fromCurrency = $result $toCurrency";

            require_once './../public/Views/response.phtml';
        }
    }
}