<?php

namespace Spil\LockState;

interface LockStateInterface
{
    function lock();
    function unlock();
    function isUnlocked();
    function isLocked();
}
