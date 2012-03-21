<?php

namespace Spil\LockState;

final class NullLockState implements NullLockStateInterface
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
