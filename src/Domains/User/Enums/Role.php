<?php declare(strict_types=1);

namespace Domains\User\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Role extends Enum
{
    const ADMIN = 'ADMIN';
    const COMPANY = 'COMPANY';
    const USER = 'USER';
}
