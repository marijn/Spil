<?php

namespace Spil\LockState;

interface LockStateInterface
{
    function lock();
    function unlock();
}
