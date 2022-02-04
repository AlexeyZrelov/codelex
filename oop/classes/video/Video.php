<?php

class Video
{
    private string $title;
    private int $rating;
    private string $rent;

    public function __construct(int $rating = 0, string $title = '')
    {
        $this->title = $title;
        $this->rating = $rating;
        $this->rent = "No";
    }

    public function getRating(): int
    {
        return $this->rating;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setRent(string $rent): void
    {
        $this->rent = $rent;
    }

    public function getRent(): string
    {
        return $this->rent;
    }

}