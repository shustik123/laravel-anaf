<?php

namespace Andali\Anaf\Domain\Info;

use Spatie\LaravelData\Data;

class LocationData extends Data
{
    public function __construct(
        public ?string $judet,
        public ?string $localitate,
        public ?string $strada,
        public ?string $stradaNumar,
        public ?string $altele,
    ) {
    }
}
