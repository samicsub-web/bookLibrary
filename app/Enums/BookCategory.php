<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Magazine()
 * @method static static Adventure()
 * @method static static Comic()
 * @method static static Fiction()
 * @method static static Comedy()
 */
final class BookCategory extends Enum
{
    const Magazine = 1;
    const Adventure = 2;
    const Comic = 3;
    const Fiction = 4;
    const Comedy = 5;
}
