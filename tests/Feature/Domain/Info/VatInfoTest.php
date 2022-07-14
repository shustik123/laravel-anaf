<?php

use Andali\Anaf\Anaf;

it('it will get info for vat numbers', function ($vatNumber) {
    $result = Anaf::for($vatNumber)->info();

    expect($result)
        ->toBeInstanceOf(\Andali\Anaf\Domain\Info\AnafData::class)
        ->denumire->toEqual('ANDALI SOLUTIONS PRO S.R.L.')
        ->adresa->toBeInstanceOf(\Andali\Anaf\Domain\Info\LocationData::class)
        ->adresa->judet->toEqual('Argeş')
        ->adresa->localitate->toEqual('Sat Lereşti Com. Lereşti')
        ->adresa->strada->toEqual('Şotcan')
        ->adresa->stradaNumar->toEqual('940')
        ->adresa->altele->toEqual('Et.parter')
        ->nrRegCom->toEqual('J03/176/2018');
})->with([
    '38744563',
]);

it('it will get info for vat numbers with payable vat', function ($vatNumber) {
    $result = Anaf::for($vatNumber)->info();
    expect($result)
        ->toBeInstanceOf(\Andali\Anaf\Domain\Info\AnafData::class)
        ->denumire->toEqual('PUFFY SOLUTIONS S.R.L.')
        ->adresa->toBeInstanceOf(\Andali\Anaf\Domain\Info\LocationData::class)
        ->adresa->judet->toEqual('Argeş')
        ->adresa->localitate->toEqual('Sat Cetăţeni Com. Cetăţeni')
        ->adresa->strada->toEqual('Dealului')
        ->adresa->stradaNumar->toEqual('46')
        ->nrRegCom->toEqual('J03/939/2015')
        ->scpTVA->toBeTrue();
})->with([
    'RO34735333',
]);
