<?php

namespace Spil\LockState;

final class TemporalNullLockedState extends TemporalLockedStateAbstract implements NullLockStateInterface
{
    public function lock()
    {
        return $this;
    }

    public function unlock()
    {
        return $this;
    }
}
