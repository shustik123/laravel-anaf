<?php

namespace Andali\Anaf\Domain\Financial;

use Andali\Anaf\Domain\Financial\Casts\FinancialCast;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class FinancialData extends Data
{
    public function __construct(
        public int $an,
        public int $cui,
        public ?string $deni,
        public int $caen,
        public ?string $den_caen,
        #[WithCast(FinancialCast::class)]
        public FinancialDetailsData $i,
    ) {
    }
}
