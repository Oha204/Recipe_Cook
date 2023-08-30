<?php

class Email
{
    private string $addressEmail;
    
    /**
     * @param string $adressEmail
     * @throws InvalidArgumentException if email format is invalid
     */
    public function __construct(string $addressEmail)
    {
        if (filter_var($addressEmail, FILTER_VALIDATE_EMAIL) === false) {
        throw new InvalidArgumentException("Le format de l'email est incorrect");
        }
        $this->addressEmail = $addressEmail;
    }

    public function getDomain(): string
    {
        $emailParts = explode('@', $this->addressEmail);
        return $emailParts[1];
    }

    public function getAddressEmail(): string
    {
        return $this->addressEmail;
    }
}
