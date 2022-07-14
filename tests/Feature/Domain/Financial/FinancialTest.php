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
        ->i->numar_mediu_de_salariati->toBe(1)
        ->i->pierdere_neta->toBe(0)
        ->i->profit_net->toBe(94702)
        ->i->pierdere_bruta->toBe(0)
        ->i->profit_brut->toBe(95915)
        ->i->cheltuieli_totale->toBe(51819)
        ->i->venituri_totale->toBe(147734)
        ->i->cifra_de_afaceri_neta->toBe(136368)
        ->i->patrimoniul_regiei->toBe(0)
        ->i->capital_subscris_varsat->toBe(1000)
        ->i->capitaluri_total_din_care->toBe(242109)
        ->i->provizioane->toBe(0)
        ->i->venituri_in_avans->toBe(72264)
        ->i->datorii->toBe(28116)
        ->i->cheltuieli_in_avans->toBe(0)
        ->i->casa_si_conturi_la_banci->toBe(256619)
        ->i->creante->toBe(61861)
        ->i->stocuri->toBe(17147)
        ->i->active_circulante_total_din_care->toBe(335627)
        ->i->active_imobilizate_total->toBe(6862);
})->with([
    '38744563',
]);

it('it will thrown an error if bilant not found', function () {
    $result = Anaf::for('123456')->bilant(2021);
})->throws(\Andali\Anaf\Domain\Info\Exceptions\VatNumberNotFound::class);
