<?php

namespace Spil\LockState;

final class TemporalUnLockedState extends TemporalLockedStateAbstract
{
    public function lock()
    {
        if (!$this->dateRange->isWithin(new DateTime())) {
            throw new \DomainException("Timelock active");
        }

        return new TemporalLockedState($this->dateRange);
    }

    public function unlock()
    {
        throw new \DomainException("Already unlocked");
    }

    public function isUnlocked()
    {
        return true;
    }
    
    public function isLocked()
    {
        return false;
    }
}
