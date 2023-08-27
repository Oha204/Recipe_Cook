<?php

class EmailFile
{
    private const FILE_NAME= __DIR__ . '/../email_NL.txt';
    private array $emails =[];

    public function getEmails(): array
    {
        return $this->emails;
    }

    public function add(Email $email): void
    {
        // Vérification doublon
        if (in_array($email->getAdressEmail(), $this->emails)) {
            throw new Exception("Cet email est déjà inscrit à notre newsletter");
        }
    
        file_put_contents(self::FILE_NAME, $email->getAdressEmail() . PHP_EOL, FILE_APPEND);
        $this->emails[] = $email->getAdressEmail();
    }   
}
