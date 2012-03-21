<?php

namespace Spil;

use DateTime;

final class LockFactory
{
    public function createUnlockedLock($secret)
    {
        return new Lock($secret, new LockState\UnlockedState());
    }

    public function createLockedLock($secret)
    {
        return new Lock($secret, new LockState\LockedState());
    }
    
    public function createTemporalUnlockedLock($secret, DateTime $from, DateTime $until)
    {
        return new Lock($secret, new LockState\TemporalUnlockedState(new DateRange($from, $until)));
    }
    
    public function createTemporalLockedLock($secret, DateTime $from, DateTime $until)
    {
        return new Lock($secret, new LockState\TemporalLockedState(new DateRange($from, $until)));
    }
}
