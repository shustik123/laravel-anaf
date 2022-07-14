<?php

namespace Andali\Anaf\Domain\Info\Casts;

use Andali\Anaf\Domain\Info\LocationData;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class AddressCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $context): LocationData
    {
        $adresa = [];

        // Normal case from all uppercase
        $rawText = mb_convert_case($value, MB_CASE_TITLE, 'UTF-8');

        // Parse address
        $list = array_map('trim', explode(',', $rawText, 5));
        [$judet, $localitate, $strada, $numar, $altele] = array_pad($list, 5, '');

        // Parse judet
        $adresa['judet'] = trim(str_replace('Jud.', '', $judet));

        // Parse localitate
        $adresa['localitate'] = trim(str_replace(['Mun.', 'Orş.'], ['', 'Oraş'], $localitate));

        // Parse strada
        $adresa['strada'] = trim(str_replace('Str.', '', $strada));

        // Parse strada numar
        $adresa['stradaNumar'] = trim(str_replace('Nr.', '', $numar));

        // Parse altele
        $adresa['altele'] = trim($altele);

        return LocationData::from($adresa);
    }
}
