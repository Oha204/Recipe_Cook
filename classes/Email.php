<?php

class Email
{
    private string $adressEmail;
    
    /**
     * @param string $adressEmail
     * @throws InvalidArgumentException if email format is invalid
     */
    public function __construct(string $adressEmail)
    {
        if (filter_var($adressEmail, FILTER_VALIDATE_EMAIL) === false) {
        throw new InvalidArgumentException("Le format de l'email est incorrect");
        }
        $this->adressEmail = $adressEmail;
    }

    public function getAdressEmail(): string
    {
        return $this->adressEmail;
    }
}
