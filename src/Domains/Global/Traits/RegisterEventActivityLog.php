<?php

namespace Domains\Global\Traits;

use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

trait RegisterEventActivityLog
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->useLogName("$this->table")
            ->setDescriptionForEvent(fn (string $eventName) => "This model has been {$eventName}")
            ->logExcept(['updated_at'])
            ->logOnlyDirty();
    }
}
