<?php

use Andali\Anaf\Rules\ValidVatNumber;

it('will pass for valid vat numbers', function ($vatNumber) {
    $result = (new ValidVatNumber())->passes('vatNumber', $vatNumber);

    expect($result)->toBeTrue();
})->with([
    'RO34735333',
    '34735333',
    '38744563',
    'RO38744563',
]);

it('will not pass for invalid vat numbers', function ($vatNumber) {
    $result = (new ValidVatNumber())->passes('vatNumber', $vatNumber);

    expect($result)->toBeFalse();
})->with([
    '123',
    'invalidavat',
    'RO123456',
]);
