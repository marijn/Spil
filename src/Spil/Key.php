<?php

namespace Spil;

final class Key
{
    private $teeth;
    
    public function __construct($teeth = null)
    {
        $this->teeth = $teeth;
    }
}