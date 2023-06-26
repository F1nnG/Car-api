<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Hatchback()
 * @method static static Convertible()
 * @method static static Coupe()
 * @method static static SUV()
 * @method static static StationWagon()
 * @method static static Sedan()
 * @method static static MPV()
 * @method static static CompanyCar()
 * @method static static Other()
 */
final class CarBody extends Enum
{
	const Hatchback = 'hatchback';
	const Convertible = 'convertible';
	const Coupe = 'coupe';
	const SUV = 'suv';
	const StationWagon = 'station wagon';
	const Sedan = 'sedan';
	const MPV = 'mpv';
	const CompanyCar = 'company car';
	const Other = 'other';
}
