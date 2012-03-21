<?php

final class LockedState implements LockState
{
    public function lock()
    {
        throw new DomainException("Already locked");
    }

    public function unlock()
    {
        return new UnlockedState;
    }
}
