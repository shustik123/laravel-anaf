# Laravel ANAF 

[![Latest Version on Packagist](https://img.shields.io/packagist/v/andalisolutions/laravel-anaf.svg)](https://packagist.org/packages/andalisolutions/laravel-anaf)
![Tests](https://github.com/andalisolutions/laravel-anaf/workflows/Tests/badge.svg)
[![PHPStan](https://github.com/andalisolutions/laravel-anaf/actions/workflows/phpstan.yml/badge.svg)](https://github.com/andalisolutions/laravel-anaf/actions/workflows/phpstan.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/andalisolutions/laravel-anaf.svg)](https://packagist.org/packages/andalisolutions/laravel-anaf)


## Installation

You can install the package via composer:

```bash
composer require andalisolutions/laravel-anaf 
```

## Usage

For company details you can use:
```php
use Andali\Anaf\Anaf;


$companyInfo = Anaf::for($vatNumber)->info();
/* AND YOU CAN ACCESS */
$companyInfo->denumire;
$companyInfo->adresa->judet;
$companyInfo->adresa->localitate;
$companyInfo->adresa->strada;
$companyInfo->adresa->stradaNumar;
$companyInfo->nrRegCom;
$companyInfo->scpTVA; // if the company is registered as a TVA payer in Romania;
// and more
```
For financial info ypu can use:
```php
$financialInfo = Anaf::for($vatNumber)->bilant($year);
/* AND YOU CAN ACCESS */
$financialInfo->deni; // company name
$financialInfo->caen;
/* AND FINANCIAL INFO FOR $year */
$financialInfo->i->numar_mediu_de_salariati;
$financialInfo->i->pierdere_neta;
$financialInfo->i->profit_net;
$financialInfo->i->pierdere_bruta;
$financialInfo->i->profit_brut;
$financialInfo->i->cheltuieli_totale;
$financialInfo->i->venituri_totale;
$financialInfo->i->cifra_de_afaceri_neta;
$financialInfo->i->patrimoniul_regiei;
$financialInfo->i->capital_subscris_varsat;
$financialInfo->i->capitaluri_total_din_care;
$financialInfo->i->provizioane;
$financialInfo->i->venituri_in_avans;
$financialInfo->i->datorii;
$financialInfo->i->cheltuieli_in_avans;
$financialInfo->i->casa_si_conturi_la_banci;
$financialInfo->i->creante;
$financialInfo->i->stocuri;
$financialInfo->i->active_circulante_total_din_care;
$financialInfo->i->active_imobilizate_total;
```
## ValidVatNumber Validation Rule

Vat number is validated with `RO` prefix or without it.
```php
use Andali\Anaf\Rules\ValidVatNumber;

$validator = Validator::make(Input::all(), [
    'first_name' => 'required',
    'last_name' => 'required',
    'company_vat' => ['required', new ValidVatNumber],
]);

if ($validator->passes()) {
    // Input is correct...
}
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/andalisolutions/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Andrei Ciungulete](https://github.com/ciungulete)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
