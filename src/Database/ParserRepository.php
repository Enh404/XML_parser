<?php

class ParserRepository
{
    private $pdoAdapter;

    public function __construct($pdoAdapter)
    {
        $this->pdoAdapter = $pdoAdapter;
    }

    private function getAdapter()
    {
        return $this->pdoAdapter;
    }

    public function saveInfo($number, $date, $sender, $recipient, $body)
    {
        $sql = "
            INSERT INTO desadv (
                NUMBER,
                DATE,
                SENDER,
                RECIPIENT,
                BODY)
            VALUES (
                '{$number}',
                '{$date}',
                '{$sender}',
                '{$recipient}',
                '{$body}')";

        $this->getAdapter()->query($sql);
    }
}
