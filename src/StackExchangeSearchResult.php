<?php

namespace DivineOmega\StackExchangeSearch;

use DivineOmega\StackExchangeSearch\Interfaces\SearchResultInterface;

class StackExchangeSearchResult implements SearchResultInterface
{
    private $title;
    private $url;
    private $description;
    private $score;

    public function __construct(array $item, int $score)
    {
        $this->title = $item['title'];
        $this->url = $item['link'];
        $this->description = 'Posted by '.$item['owner']['display_name'].' and tagged as '.implode(', ', $item['tags']);
        $this->score = $score;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getScore(): string
    {
        return $this->score;
    }
}