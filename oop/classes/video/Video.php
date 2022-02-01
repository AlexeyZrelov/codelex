<?php

class Video
{
    private string $title;
    private bool $flag;
    private int $rating;

    public function checkout(): void
    {

    }

    public function return(): void
    {

    }

    public function rating(): void
    {

    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getRating(): int
    {
        return $this->rating;
    }

    public function isFlag(): bool
    {
        return $this->flag;
    }

}