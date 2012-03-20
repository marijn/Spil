<?php

final class TemporalLockedState implements LockState
{
    private $timeframe;
    
    public function __construct(TimeFrame $timeframe)
    {
        $this->timeframe = $timeframe;
    }

    public function lock()
    {
        throw new DomainException("Already locked");
    }

    public function unlock()
    {
        if (!$this->timeframe->isWithin(new DateTime())) {
            throw new DomainException("Timelock active");
        }

        return new TemporalUnlockedState($this->timeframe);
    }
}
