<?php

namespace Andali\Anaf\Domain\Financial;

use Spatie\LaravelData\Data;

class FinancialDetailsData extends Data
{
    public function __construct(
        public ?int $numar_mediu_de_salariati,
        public ?int $pierdere_neta,
        public ?int $profit_net,
        public ?int $pierdere_bruta,
        public ?int $profit_brut,
        public ?int $cheltuieli_totale,
        public ?int $venituri_totale,
        public ?int $cifra_de_afaceri_neta,
        public ?int $patrimoniul_regiei,
        public ?int $capital_subscris_varsat,
        public ?int $capitaluri_total_din_care,
        public ?int $provizioane,
        public ?int $venituri_in_avans,
        public ?int $datorii,
        public ?int $cheltuieli_in_avans,
        public ?int $casa_si_conturi_la_banci,
        public ?int $creante,
        public ?int $stocuri,
        public ?int $active_circulante_total_din_care,
        public ?int $active_imobilizate_total

    ) {
    }
}
