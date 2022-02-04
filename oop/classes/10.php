<?php

class Application
{
    public VideoStore $vs;
    public Video $v;

    public function run()
    {
        $this->vs = new VideoStore();
        $this->v = new Video();

        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!\n";
                    die;
                case 1:

                    $title = readline('Enter the name of the video you want to add: ');
                    $rating = readline('Enter rating: ');

                    $this->addMovies($rating, $title);

                    break;
                case 2:
                    $this->listInventory();
                    $rent = readline('Enter the namber of the video you want to rent: ');

                    $this->rentVideo($rent);

                    break;
                case 3:

                    $this->listInventory();
                    $return = readline('Enter the namber of the video you want to return: ');

                    $this->returnVideo($return);

                    break;
                case 4:
                    $this->listInventory();
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }

    public function addMovies($rating, $title): void
    {
        $this->vs->addVideo($rating, $title);

    }

    public function rentVideo($rent): void
    {
        $index = $rent - 1;
        $this->vs->getStore()[$index]->setRent('Yes');
    }

    public function returnVideo($return)
    {
        $index = $return - 1;
        $this->vs->getStore()[$index]->setRent('No');
    }

    public function listInventory(): void
    {
        $this->vs->showStore();
    }
}

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
                . " | Rating: " . str_repeat("★", $v->getRating()) . " [" . $v->getRating() . "]" . PHP_EOL;
        }
        echo "===========================================\n";
    }

}

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

$app = new Application();
$app->run();