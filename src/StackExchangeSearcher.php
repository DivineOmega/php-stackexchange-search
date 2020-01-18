<?php

namespace DivineOmega\StackExchangeSearch;

use DivineOmega\StackExchangeSearch\Interfaces\SearcherInterface;

class StackExchangeSearcher implements SearcherInterface
{
    const URL = 'https://api.stackexchange.com/2.2/similar?order=desc&sort=relevance&title=[QUERY]&site=[SITE]';

    private $site;

    public function __construct(string $site)
    {
        $this->site = $site;
    }

    public function search(string $query): array
    {
        $url = $this->buildUrl($query);

        $response = gzdecode(file_get_contents($url));
        $decodedResponse = json_decode($response, true);

        $results = [];

        $score = count($decodedResponse['items']);

        foreach ($decodedResponse['items'] as $item) {
            $results[] = new StackExchangeSearchResult($item, $score);
            $score--;
        }

        return $results;
    }

    private function buildUrl(string $query): string
    {
        return str_replace(
            ['[QUERY]', '[SITE]'],
            [urlencode($query), urlencode($this->site)],
            self::URL
        );
    }
}