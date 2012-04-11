<?php

namespace Spil\LockState;

final class TemporalNullLockState extends TemporalLockedStateAbstract
{
    public function lock()
    {
        return $this;
    }

    public function unlock()
    {
        return $this;
    }

    public function isUnlocked()
    {
        return null;
    }
    
    public function isLocked()
    {
        return null;
    }
}
