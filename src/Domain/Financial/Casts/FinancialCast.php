<?php

namespace Andali\Anaf\Domain\Financial\Casts;

use Andali\Anaf\Domain\Financial\FinancialDetailsData;
use Illuminate\Support\Str;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class FinancialCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $context): FinancialDetailsData
    {
        $keyed = collect($value)->mapWithKeys(function ($item, $key) {
            $removedSpecialChar = iconv('UTF-8', 'ASCII//TRANSLIT', $item['val_den_indicator']);
            $newKey = Str::of($removedSpecialChar)
                ->lower()
                ->remove([':', ',', '-'])->snake()->toString();

            return [$newKey => $item['val_indicator']];
        });

        return FinancialDetailsData::from($keyed);
    }
}
