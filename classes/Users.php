<?php

class Users {
    private int $id;
    private string $mail;
    private int $password;

    public function getId(): int {
        return $this->id;
    }
    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getMail(): string {
        return $this->mail;
    }
    public function setMail(string $mail): void {
        $this->mail = $mail;
    }

    public function getPassword(): int {
        return $this->password;
    }
    public function setPassword(string $password): void {
        $this->password = $password;
    }
}