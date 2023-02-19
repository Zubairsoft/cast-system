<?php

namespace Domains\Global\Traits;

trait Activation
{
    /**
     * check is activated
     * 
     * @return bool
     */
    public function is_activated(): bool
    {
        return $this->is_active;
    }

    /**
     *  check is disabled
     * 
     * @return bool
     */
    public function is_disabled(): bool
    {
        return !$this->is_active;
    }
}
