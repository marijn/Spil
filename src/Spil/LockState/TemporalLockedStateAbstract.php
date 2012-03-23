<?php

namespace Spil\LockState;

use Spil\DateRange;

abstract class TemporalLockedStateAbstract implements LockStateInterface
{
    protected $dateRange;
    
    public function __construct(DateRange $dateRange)
    {
        $this->dateRange = $dateRange;
    }
    
    public function getDateRange()
    {
        return $this->dateRange;
    }
}
