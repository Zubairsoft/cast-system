<?php

namespace Domains\Support\Traits;

trait ToggleIsActiveTrait
{
    public function toggleIsActive(): void
    {
        $this->update([
            'is_active' => !$this->is_active,
        ]);
    }
}
