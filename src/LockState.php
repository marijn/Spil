<?php

final interface LockState
{
    function lock();
    function unlock();
}
