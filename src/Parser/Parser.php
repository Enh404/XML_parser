<?php

require_once __DIR__ . '/../Database/ParserRepository.php';

class Parser
{
    private $parserRepository;

    public function __construct($pdoAdapter)
    {
        $this->parserRepository = new ParserRepository($pdoAdapter);
    }

    private function getRepository()
    {
        return $this->parserRepository;
    }
    public function parse($fileName)
    {
        if (file_exists($fileName)) {
            $xml = simplexml_load_file($fileName);
            $number = $xml->NUMBER;
            $date = $xml->DATE;
            $sender = $xml->HEAD->SENDER;
            $recipient = $xml->HEAD->RECIPIENT;
            $body = json_encode($xml);
            $this->getRepository()->saveInfo($number, $date, $sender, $recipient, $body);
            exit('Данные сохранены');
        } else {
            exit('Файл ' . $fileName . ' не найден');
        }
    }
}
