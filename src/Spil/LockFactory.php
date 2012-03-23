<?php

namespace Spil;

use DateTime;

final class LockFactory
{
    public function createUnlockedLock($secret)
    {
        return new Lock(new LockState\UnlockedState(), $secret);
    }

    public function createLockedLock($secret)
    {
        return new Lock(new LockState\LockedState(), $secret);
    }
    
    public function createTemporalUnlockedLock($secret, DateTime $from, DateTime $until)
    {
        return new Lock(new LockState\TemporalUnlockedState(new DateRange($from, $until)), $secret);
    }
    
    public function createTemporalLockedLock($secret, DateTime $from, DateTime $until)
    {
        return new Lock(new LockState\TemporalLockedState(new DateRange($from, $until)), $secret);
    }
}
