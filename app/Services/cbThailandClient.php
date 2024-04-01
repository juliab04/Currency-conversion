<?php

namespace Services;

class cbThailandClient
{
    public function cbThailand(string $fromCurrency)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://apigw1.bot.or.th/bot/public/Stat-ExchangeRate/v2/DAILY_AVG_EXG_RATE/?start_period=2024-03-27&end_period=2024-03-27&currency=$fromCurrency",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-IBM-Client-Id: c2bbe063-d0ff-456c-bc08-fbd5115fb340"
            ],
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }
}