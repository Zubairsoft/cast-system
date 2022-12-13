<?php
namespace Domains\Companies\Enums;

use BenSampo\Enum\Enum;
/**
 * @method static static PAYMENT()
 * @method static static FREE()
 */
final class AccountType  extends Enum
{
    const PAYMENT='payment';
    const FREE='free';
}