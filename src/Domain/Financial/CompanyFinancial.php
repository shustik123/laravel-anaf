<?php

namespace Andali\Anaf\Domain\Financial;

use Andali\Anaf\Domain\Info\Exceptions\VatNumberNotFound;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

trait CompanyFinancial
{
    public function bilant(int $year): FinancialData|VatNumberNotFound
    {
        $vatNumber = Str::of($this->vatNumber)->remove('ro', false)
            ->trim()
            ->__toString();

        /* @var array $info */
        $info = Http::withHeaders(['Content-Type' => 'application/json'])
            ->get($this->bilantUrl, [
                'cui' => $vatNumber,
                'an' => $year,
            ])->json();
        $data = FinancialData::from($info);
        if (filled($data->deni)) {
            return $data;
        } else {
            throw VatNumberNotFound::make();
        }
    }
}
