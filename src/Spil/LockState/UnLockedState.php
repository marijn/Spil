<?php

namespace Spil\LockState;

final class UnLockedState implements LockStateInterface
{
    public function lock()
    {
        return new LockedState;
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
