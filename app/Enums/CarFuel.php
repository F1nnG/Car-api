<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Electric()
 * @method static static Gas()
 * @method static static Diesel()
 * @method static static Hybrid()
 */
final class CarFuel extends Enum
{
	const Electric = 'electric';
	const Gas = 'gas';
	const Diesel = 'diesel';
	const Hybrid = 'hybrid';
}
