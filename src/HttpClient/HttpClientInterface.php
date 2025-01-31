    <?php

    declare(strict_types=1);

    namespace Auki\CoreBundle\HttpClient;

    interface HttpClientInterface
    {
        public function post(string $url, string $body): void;
    }