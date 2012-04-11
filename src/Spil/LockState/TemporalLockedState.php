<?php

namespace Spil\LockState;

use Spil\DateRange;

final class TemporalLockedState extends TemporalLockedStateAbstract
{
    public function lock()
    {
        throw new \DomainException("Already locked");
    }

    public function unlock()
    {
        if (!$this->dateRange->isWithin(new \DateTime())) {
            throw new \DomainException("Timelock active");
        }

        return new TemporalUnlockedState($this->dateRange);
    }

    public function isUnlocked()
    {
        return false;
    }
    
    public function isLocked()
    {
        return true;
    }
}
