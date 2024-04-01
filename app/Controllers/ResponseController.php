<?php

namespace Controllers;
use Services\ConvectorService;

class ResponseController
{
    public function getResponse()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');;
        }

        $fromCurrency = $_POST['from_currency'];
        $toCurrency = $_POST['to_currency'];
        $quantity = (int)$_POST['quantity'];

        $convector = new ConvectorService();
        $convector->conversion($fromCurrency, $toCurrency, $quantity);


    }
}