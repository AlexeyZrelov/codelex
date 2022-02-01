<?php

class Movie
{
    private string $title;
    private string $studio;
    private string $rating;
    private array $pg = [];

    public function __construct(string $title, string $studio, string $rating)
    {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

    public function getPg(Movie ...$obj): array
    {
        foreach ($obj as $v) {

            if (strpos($v->rating,'PG') !== false) {
                $this->pg[] = $v;
            }
        }

        return $this->pg;
    }

    public function countPg(): int
    {
        return count($this->pg);
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getStudio(): string
    {
        return $this->studio;
    }

    public function getRating(): string
    {
        return $this->rating;
    }

}

$a = new Movie("Casino Royal", "Eon Productions", "PG13");
$b = new Movie("Glass", "Buena Vista International", "PG13");
$c = new Movie("Spider-Man: Into the Spider-Verse", "Columbia Pictures", "PG13");

foreach ($a->getPg($a, $b, $c) as $v) {
    echo "{$v->getTitle()} {$v->getStudio()} {$v->getRating()}" . PHP_EOL;
}

if ($a->countPg() == 0) {
    echo "U-p-s-s ! \n";
}