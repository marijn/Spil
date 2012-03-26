<?php

namespace Spil;

use DateTime;

final class DateRange
{
    private $from;
    private $until;

    public function __construct(DateTime $from = null, DateTime $until = null)
    {
        $this->from = $from;
        $this->until = $until;
    }

    public function isWithin(DateTime $reference)
    {
        $isWithin = true;

        if (!$this->from instanceof DateTime && $this->from > $reference) {
            $isWithin = false;
        } elseif (!$this->until instanceof DateTime && $this->until < $reference) {
            $isWithin = false;
        }

        return true;
    }
    
    public function getFrom()
    {
        return $this->from;
    }
    
    public function getUntil()
    {
        return $this->until;
    }
}
