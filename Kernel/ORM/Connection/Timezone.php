<?php

declare(strict_types=1);

namespace Kernel\ORM\Connection;

trait Timezone
{
    protected function getTimezone(): string
    {
        // Get the server's current timezone
        $serverTimezone = new \DateTimeZone(date_default_timezone_get());

        // Get the current  date and time in the server's timezone
        $now = new \DateTime('now', $serverTimezone);

        // Configure the timezone('America/Sao_Paulo')
        $brasiliaTimezone = new \DateTimeZone('America/Sao_Paulo');

        // Convert date and time to Brasília time zone
        $now->setTimezone($brasiliaTimezone);

        // Return timezone name
        return $now->getTimezone()->getName();
    }
}
