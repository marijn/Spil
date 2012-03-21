<?php

final class UnLockedState implements LockState
{
    public function lock()
    {
        return new LockedState;
    }

    public function unlock()
    {
        throw new DomainException("Already unlocked");
    }
}
