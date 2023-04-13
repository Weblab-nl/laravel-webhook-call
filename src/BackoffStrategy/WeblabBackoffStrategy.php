<?php

namespace Weblab\WebhookCall\BackoffStrategy;

use Spatie\WebhookServer\BackoffStrategy\BackoffStrategy;

class WeblabBackoffStrategy implements BackoffStrategy
{
    public function waitInSecondsAfterAttempt(int $attempt): int
    {
        // return in increments of 12 minutes if not longer than 1 hour
        if (($attempt * 720) < 3600) {
            return $attempt * 720;
        }

        // return 1 hour waiting time
        return 3600;
    }
}
