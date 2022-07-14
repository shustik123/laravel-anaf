<?php

namespace Andali\Anaf\Domain\Info\Exceptions;

use Exception;

class VatNumberNotFound extends Exception
{
    public static function make(): self
    {
        return new static('Acest cui nu a putut fi gasit la ANAF sau serverul ANAF nu raspunde.');
    }
}
