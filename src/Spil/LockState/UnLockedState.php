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
}
