<?php
// Author: Ng Jun Chen
namespace App\Logging;

use Monolog\Formatter\LineFormatter;

class logFormatter
{
    public function __invoke($logger)
    {
        foreach ($logger->getHandlers() as $handler){
            $handler->setFormatter(
                new LineFormatter('[%datetime%]: %message% %context%')
            );
        }
    }
}