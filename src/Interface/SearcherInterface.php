<?php

namespace DivineOmega\StackExchangeSearch\Interfaces;

interface SearcherInterface
{
    public function search(string $query): array;
}