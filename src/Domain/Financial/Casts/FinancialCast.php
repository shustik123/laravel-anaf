<?php

namespace Andali\Anaf\Domain\Financial\Casts;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class FinancialCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $context): Collection
    {
        $keyed = collect($value)->mapWithKeys(function ($item, $key) {
            return [$item['val_den_indicator'] => $item['val_indicator']];
        });

        return $keyed;
    }
}
