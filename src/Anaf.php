<?php

namespace Andali\Anaf;

use Andali\Anaf\Domain\Info\VatInfo;

class Anaf
{
    use VatInfo;

    public const VAT_URL = 'https://webservicesp.anaf.ro/PlatitorTvaRest/api/v6/ws/tva';

    public const BILANT_URL = 'https://webservicesp.anaf.ro/bilant';

    public function __construct(
        public string $vatNumber,
        private readonly string $vatUrl = self::VAT_URL,
        private readonly string $bilantUrl = self::BILANT_URL
    ) {
    }

    public static function for(string $vatNumber)
    {
        return new self(vatNumber: $vatNumber);
    }
}
