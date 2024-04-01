<?php

namespace Controllers;
use Models\Currency;

class MainController
{
    public function main()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');;
        }


        $fromCurrency = Currency::getFrom();

        $toCurrency = Currency::getTo();

        require_once './../public/Views/main.phtml';

    }


}