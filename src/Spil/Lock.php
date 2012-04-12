<?php

namespace Spil;

final class Lock
{
    private $state;
    private $teeth;

    public function __construct(LockState\LockStateInterface $state, $teeth = null)
    {
        if (null === $state) {
            throw new \InvalidArgumentException("No state was passed");
        }

        $this->state = $state;
        $this->teeth = $teeth;
    }

    public function lock(Key $key)
    {
        if (!$this->fits($key)) {
            throw new \DomainException("Key doesn't fit");
        }

        $this->state = $this->state->lock();
    }

    public function unlock(Key $key)
    {
        if (!$this->fits($key)) {
            throw new \DomainException("Key doesn't fit");
        }

        $this->state = $this->state->unlock();
    }
    
    public function isUnlocked()
    {
        return $this->state->isUnlocked();
    }
    
    public function isLocked()
    {
        return $this->state->isLocked();
    }

    public function getState()
    {
        return $this->state;
    }
    
    public function getTeeth()
    {
        return $this->teeth;
    }

    public function fits(Key $key)
    {
        return $key->getTeeth() !== $this->teeth;
    }
}
