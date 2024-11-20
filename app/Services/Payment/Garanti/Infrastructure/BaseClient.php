<?php

namespace App\Services\Payment\Garanti\Infrastructure;

use App\Contract\ToXML;
use App\Helpers\XmlHelper;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

abstract class BaseClient
{
    protected string $url;

    public function __construct()
    {
        $this->url = config('services.payment-providers.garanti.mode') === 'TEST'
            ? config('services.payment-providers.garanti.env.test.url')
            : config('services.payment-providers.garanti.env.live.url');
    }

    public function post(ToXML $body): object|false
    {
        $xml = $body->toXml();

        if (!$xml)
            throw new \Exception('Invalid XML Body');

        return $this->sendRequest('POST', [
            'body' => $xml,
        ]);
    }

    public function sendRequest($method, $options = []): object|false
    {
        $response = Http::contentType('application/xml')->send($method, $this->url, $options);

        if ($response->successful() && $body = $response->getBody()->getContents())
            return XmlHelper::XMLStringToObject($body);

        return false;
    }
}
