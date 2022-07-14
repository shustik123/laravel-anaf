<?php

use Andali\Anaf\Anaf;

it('it will get financial data for vat numbers', function ($vatNumber) {
    $result = Anaf::for($vatNumber)->bilant(2021);
    expect($result)
        ->toBeInstanceOf(\Andali\Anaf\Domain\Financial\FinancialData::class)
        ->cui->toEqual(38744563)
        ->deni->toEqual('ANDALI SOLUTIONS PRO SRL')
        ->caen->toEqual(6201)
        ->den_caen->toEqual('Activitati de realizare a soft-ului la comanda (software orientat client)')
        ->and($result->i['Profit brut'])->toEqual(95915)
        ->and($result->i['CHELTUIELI TOTALE'])->toEqual(51819)
        ->and($result->i['VENITURI TOTALE'])->toEqual(147734)
        ->and($result->i['Cifra de afaceri neta'])->toEqual(136368)
        ->and($result->i['Patrimoniul regiei'])->toEqual(0)
        ->and($result->i['Capital subscris varsat'])->toEqual(1000)
        ->and($result->i['CAPITALURI - TOTAL, din care:'])->toEqual(242109)
        ->and($result->i['PROVIZIOANE'])->toEqual(0)
        ->and($result->i['VENITURI IN AVANS'])->toEqual(72264)
        ->and($result->i['DATORII '])->toEqual(28116)
        ->and($result->i['CHELTUIELI IN AVANS'])->toEqual(0)
        ->and($result->i['Casa şi conturi la bănci'])->toEqual(256619)
        ->and($result->i['Creante'])->toEqual(61861)
        ->and($result->i['Stocuri'])->toEqual(17147)
        ->and($result->i['ACTIVE CIRCULANTE - TOTAL, din care:'])->toEqual(335627)
        ->and($result->i['ACTIVE IMOBILIZATE - TOTAL '])->toEqual(6862)
        ->and($result->i['Numar mediu de salariati'])->toEqual(1)
        ->and($result->i['Pierdere  neta'])->toEqual(0)
        ->and($result->i['Profit net'])->toEqual(94702)
        ->and($result->i['Pierdere bruta'])->toEqual(0);
})->with([
    '38744563',
]);

it('it will thrown an error if bilant not found', function () {
    $result = Anaf::for('123456')->bilant(2021);
})->throws(\Andali\Anaf\Domain\Info\Exceptions\VatNumberNotFound::class);
