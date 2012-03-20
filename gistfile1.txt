<?php

final class Lock
{
    private $teeth;
    
    public function __construct($teeth, LockState $state = null)
    {
        $this->teeth = $teeth;
        $this->state = $state ?: new LockedState;
    }
    
    public function lock(Key $key)
    {
        $this->insert($key);

        $this->state = $this->state->lock();
    }
    
    public function unlock(Key $key)
    {
        $this->insert($key);

        $this->state = $this->unlock->lock();
    }

    private function insert(Key $key)
    {
        if ($key->getTeeth() !== $this->teeth) {
            throw new DomainException("Key doesn't fit");
        }
    }
}
