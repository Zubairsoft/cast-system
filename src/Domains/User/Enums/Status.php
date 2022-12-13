<?php declare(strict_types=1);

namespace Domains\User\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static BLOCKED()
 * @method static static ACTIVE()
 */
final class Status extends Enum
{
    const BLOCKED = 'blocked';
    const ACTIVE='active';


}
