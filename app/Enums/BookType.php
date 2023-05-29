<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Editions()
 * @method static static Volumes()
 * @method static static Normal()
 */
final class BookType extends Enum
{
    const Editions = 1;
    const Volumes = 2;
    const Normal = 3;
}
