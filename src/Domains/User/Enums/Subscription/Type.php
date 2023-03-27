<?php

declare(strict_types=1);

namespace Domains\User\Enums\Subscription;

use BenSampo\Enum\Enum;

final class Type extends Enum
{
    const TRIAL = 'trail';
    const ENDED='ended';
    const LIMITED='limited';
    const MONTHLY = 'monthly';
    const YEARLY = 'yearly';
}
