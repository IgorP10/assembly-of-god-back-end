<?php

namespace Kernel\ORM\Connection;

trait Timezone
{
    protected function getTimezone() : string
    {
        $brasiliaTimezone = new \DateTimeZone('America/Sao_Paulo');
        $now = new \DateTime('now', $brasiliaTimezone);

        # 3600 = 60 * 60 (seconds in 1 hour)
        return $brasiliaTimezone->getOffset($now) / 3600; //Return -3 hours
    }
}