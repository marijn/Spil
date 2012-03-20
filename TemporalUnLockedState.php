<?php

final class TemporalUnLockedState implements LockState
{
    private $timeframe;
    
    public function __construct(TimeFrame $timeframe)
    {
        $this->timeframe = $timeframe;
    }

    public function lock()
    {
        if (!$this->timeframe->isWithin(new DateTime())) {
            throw new DomainException("Timelock active");
        }

        return new TemporalLockedState($this->timeframe);
    }

    public function unlock()
    {
        throw new DomainException("Already unlocked");
    }
}