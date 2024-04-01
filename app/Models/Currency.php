<?php

namespace Models;

use Services\ConnectionFactory;

class Currency
{
    private int $id_from;
    private int $id_to;

    public static function getFrom()
    {
        $statement = ConnectionFactory::create()->query("SELECT * FROM from_currency");
        return $statement->fetchAll();
    }

    public static function getTo()
    {
        $statementTwo = ConnectionFactory::create()->query("SELECT * FROM to_currency");
        return $statementTwo->fetchAll();
    }


    public function setIdFrom(int $id_from): void
    {
        $this->id_from = $id_from;
    }

    public function getIdFrom(): int
    {
        return $this->id_from;
    }

    public function setIdTo(int $id_to): void
    {
        $this->id_to = $id_to;
    }

    public function getIdTo(): int
    {
        return $this->id_to;
    }

}