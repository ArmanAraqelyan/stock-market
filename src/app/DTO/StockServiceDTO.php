<?php

namespace App\DTO;

final class StockServiceDTO
{
    private string $companySymbol;

    private string $startDate;

    private string $endDate;

    private string $email;

    public static function init(array $request): self
    {
        return (new self())
            ->setCompanySymbol($request['company_symbol'])
            ->setStartDate($request['start_date'])
            ->setEndDate($request['end_date'])
            ->setEmail($request['email']);
    }

    public function getCompanySymbol(): string
    {
        return $this->companySymbol;
    }

    public function setCompanySymbol(string $companySymbol): self
    {
        $this->companySymbol = $companySymbol;
        return $this;
    }

    public function getStartDate(): string
    {
        return $this->startDate;
    }

    public function setStartDate(string $startDate): self
    {
        $this->startDate = $startDate;
        return $this;
    }

    public function getEndDate(): string
    {
        return $this->endDate;
    }

    public function setEndDate(string $endDate): self
    {
        $this->endDate = $endDate;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'company_symbol' => $this->getCompanySymbol(),
            'start_date' => $this->getStartDate(),
            'end_date' => $this->getEndDate(),
            'email' => $this->getEmail()
        ];
    }
}
