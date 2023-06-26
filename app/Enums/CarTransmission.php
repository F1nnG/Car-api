<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Manual()
 * @method static static Automatic()
 * @method static static SemiAutomatic()
 */
final class CarTransmission extends Enum
{
	const Manual = 'manual';
	const Automatic = 'automatic';
	const SemiAutomatic = 'semi-automatic';
}
