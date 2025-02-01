<?php

declare(strict_types=1);

namespace VladimirTer\CoreBundle\HttpClient;

interface HttpClientInterface
{
    public function post(string $url, string $body): void;
}