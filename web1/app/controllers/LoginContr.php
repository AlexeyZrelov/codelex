<?php

class LoginContr extends LoginModel
{
    private string $uid;
    private string $pwd;

    public function __construct($uid, $pwd)
    {
        $this->uid = $uid;
        $this->pwd = $pwd;
    }

    public function loginUser(): void
    {
        if ($this->emptyInput() == false) {
            // echo "Empty input!";
            header("location: ../../index.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->uid, $this->pwd);
    }

    private function emptyInput(): bool
    {
//        $result = null;
        if (empty($this->uid) || empty($this->pwd)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

}