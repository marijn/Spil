<?php

namespace Spil\LockState;

final interface LockStateInterface
{
    function lock();
    function unlock();
}
