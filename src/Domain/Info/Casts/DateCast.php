<?php

namespace Andali\Anaf\Domain\Info\Casts;

use Carbon\Carbon;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class DateCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $context): Carbon|null
    {
        if (filled($value)) {
            return Carbon::parse($value);
        }

        return null;
    }
}
