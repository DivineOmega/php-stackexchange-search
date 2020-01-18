<?php

use DivineOmega\StackExchangeSearch\StackExchangeSearcher;
use DivineOmega\StackExchangeSearch\StackExchangeSearchResult;
use PHPUnit\Framework\TestCase;

final class SearchTest extends TestCase
{
    public function testSearch()
    {
        $searcher = new StackExchangeSearcher('stackoverflow');

        $results = $searcher->search('how to connect to a database in PHP');

        $this->assertGreaterThanOrEqual(1, count($results));

        foreach($results as $result) {
            $this->assertTrue($result instanceof StackExchangeSearchResult);
        }
    }

}
