<?php

final class LockFactory
{
    public function createUnlockedLock($secret)
    {
        return new Lock($secret, new UnlockedState());
    }

    public function createLockedLock($secret)
    {
        return new Lock($secret, new LockedState());
    }
    
    public function createTemporalUnlockedLock($secret, DateTime $from, DateTime $until)
    {
        return new Lock($secret, new TemporalUnlockedState(new TimeFrame($from, $until)));
    }
    
    public function createTemporalLockedLock($secret, DateTime $from, DateTime $until)
    {
        return new Lock($secret, new TemporalLockedState(new TimeFrame($from, $until)));
    }
}
