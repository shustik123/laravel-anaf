<?php

namespace Andali\Anaf\Domain\Info;

use Andali\Anaf\Domain\Info\Casts\AddressCast;
use Andali\Anaf\Domain\Info\Casts\DateCast;
use Carbon\Carbon;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class AnafData extends Data
{
    public function __construct(
        public int $cui,
        #[WithCast(DateTimeInterfaceCast::class, format: 'Y-m-d')]
        public ?Carbon $data,
        public ?string $denumire,
        #[WithCast(AddressCast::class)]
        public ?LocationData $adresa,
        public ?string $nrRegCom,
        public ?string $telefon,
        public ?string $fax,
        public ?string $codPostal,
        public ?string $act,
        public ?string $stare_inregistrare,
        public bool $scpTVA,
        #[WithCast(DateCast::class)]
        public ?Carbon $data_inceput_ScpTVA,
        #[WithCast(DateCast::class)]
        public ?Carbon $data_sfarsit_ScpTVA,
        #[WithCast(DateCast::class)]
        public ?Carbon $data_anul_imp_ScpTVA,
        public ?string $mesaj_ScpTVA,
        #[WithCast(DateCast::class)]
        public ?Carbon $dataInceputTvaInc,
        #[WithCast(DateCast::class)]
        public ?Carbon $dataSfarsitTvaInc,
        #[WithCast(DateCast::class)]
        public ?Carbon $dataActualizareTvaInc,
        #[WithCast(DateCast::class)]
        public ?Carbon $dataPublicareTvaInc,
        public ?string $tipActTvaInc,
        public ?string $statusTvaIncasare,
        #[WithCast(DateCast::class)]
        public ?Carbon $dataInactivare,
        #[WithCast(DateCast::class)]
        public ?Carbon $dataReactivare,
        #[WithCast(DateCast::class)]
        public ?Carbon $dataPublicare,
        #[WithCast(DateCast::class)]
        public ?Carbon $dataRadiere,
        public bool $statusInactivi,
        #[WithCast(DateCast::class)]
        public ?Carbon $dataInceputSplitTVA,
        #[WithCast(DateCast::class)]
        public ?Carbon $dataAnulareSplitTVA,
        public ?bool $statusSplitTVA,
        public ?string $iban,
        public bool $statusRO_e_Factura,
    ) {
    }
}
