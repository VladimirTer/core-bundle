<?php

declare(strict_types=1);

namespace VladimirTer\CoreBundle\HttpClient;

use OpenSwoole\Coroutine\Http\Client;
use CoreBundle\Exception\HttpClientException;

class HttpClient implements HttpClientInterface
{
    private string $host;
    private int $port;

    public function __construct(string $host, int $port)
    {
        $this->host = $host;
        $this->port = $port;
    }

    public function post(string $url, string $body): void
    {
        $client = new Client($this->host, $this->port);

        $client->set([
            'timeout' => 1,
        ]);

        $client->setHeaders([
            'Content-Type' => 'application/json',
        ]);

        $response = $client->post($url, $body);

        if ($response === false) {
            throw new \Exception("Ошибка при отправке HTTP-запроса");
        }

        $client->close();
    }
}