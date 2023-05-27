<?php

namespace App\Contracts;

interface PkgStoreContract
{
    public function getResponse(): self;
    public function getCompanyName(string $companySymbol): ?string;
}
