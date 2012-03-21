<?php

namespace Spil;

final class Lock
{
    private $teeth;

    public function __construct(LockState $state, $teeth = null)
    {
        if (null === $state) {
            throw new \InvalidArgumentException("No state was passed");
        }

        $this->state = $state;
        $this->teeth = $teeth;
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

    public function getState()
    {
        return $this->state;
    }

    private function insert(Key $key)
    {
        if ($key->getTeeth() !== $this->teeth) {
            throw new \DomainException("Key doesn't fit");
        }
    }
}
