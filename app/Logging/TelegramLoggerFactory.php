<?php

namespace App\Logging;

use Monolog\Logger;

class TelegramLoggerFactory
{
    public function __invoke(array $config): Logger
    {
        $logger = new Logger("telegram");
        $logger->pushHandler(new TelegramLoggerHandler());

        return $logger;
    }
}
