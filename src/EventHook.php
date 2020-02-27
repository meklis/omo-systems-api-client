<?php


namespace OmoSystemsApi;

use Karriere\JsonDecoder\JsonDecoder;

class EventHook
{
    public function __construct()
    {
    }

    public function handle($input = "") {
        if($input) {
           return $this->parse($input);
        }
        return $this->parse(file_get_contents('php://input'));
    }

    /**
     * @param $rawBody
     * @return Models\Event[]
     */
    protected function parse($rawBody) {
        $decoder = new JsonDecoder(true);
        return $decoder->decodeMultiple($rawBody, Models\Event::class);
    }
}
