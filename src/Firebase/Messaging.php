<?php

declare(strict_types=1);

namespace Kreait\Firebase;

use Kreait\Firebase\Messaging\ApiClient;
use Kreait\Firebase\Messaging\Message;
use Kreait\Firebase\Util\JSON;

class Messaging
{
    /**
     * @var ApiClient
     */
    private $client;

    public function __construct(ApiClient $client)
    {
        $this->client = $client;
    }

    public function send(Message $message): array
    {
        $response = $this->client->sendMessage($message);

        return JSON::decode((string) $response->getBody(), true);
    }
}
