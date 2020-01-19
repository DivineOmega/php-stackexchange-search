<?php

use DivineOmega\BaseSearch\Interfaces\SearchResultInterface;
use DivineOmega\StackExchangeSearch\Enums\Sites;
use DivineOmega\StackExchangeSearch\StackExchangeSearcher;
use DivineOmega\StackExchangeSearch\StackExchangeSearchResult;
use PHPUnit\Framework\TestCase;

final class SearchTest extends TestCase
{
    public function testSearch()
    {
        $searcher = new StackExchangeSearcher(Sites::STACK_OVERFLOW);

        $results = $searcher->search('how to connect to a database in PHP');

        $this->assertGreaterThanOrEqual(1, count($results));

        foreach($results as $result) {
            $this->assertTrue($result instanceof StackExchangeSearchResult);
            $this->assertTrue($result instanceof SearchResultInterface);

            $this->assertGreaterThanOrEqual(0, $result->getScore());
            $this->assertLessThanOrEqual(1, $result->getScore());
        }
    }

}
