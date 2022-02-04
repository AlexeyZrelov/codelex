<?php

class VideoStore
{
    private array $store = [];

    public function addVideo(int $rating, string $title): void
    {
        $this->store[] = new Video($rating, $title);
    }

    public function getStore(): array
    {
        return $this->store;
    }

    public function showStore(): void
    {
        $n = 0;
        echo "\n===========================================\n";
        foreach ($this->getStore() as $i => $v) {
            $n++;
            echo "$n. Title: '" . $v->getTitle() . "'"
                . " | Rent: " . $v->getRent()
                . " | Rating: " . $v->getRating() . PHP_EOL;
        }
        echo "===========================================\n";
    }

}