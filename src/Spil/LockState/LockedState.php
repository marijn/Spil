<?php

namespace Spil\LockState;

final class LockedState implements LockStateInterface
{
    public function lock()
    {
        throw new \DomainException("Already locked");
    }

    public function unlock()
    {
        return new UnlockedState;
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
