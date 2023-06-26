<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Two_Three()
 * @method static static Four_Five()
 * @method static static Six_Seven()
 */
final class CarDoors extends Enum
{
	const Twothree = '2/3';
	const Fourfive = '4/5';
	const Sixseven = '6/7';
}
