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
}
