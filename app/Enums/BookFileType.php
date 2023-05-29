<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static PDF()
 * @method static static TEXT()
 * @method static static VIDEO()
 * @method static static IMAGE()
 */
final class BookFileType extends Enum
{
    const PDF = 1;
    const TEXT = 2;
    const VIDEO = 3;
    const IMAGE = 4;
}
