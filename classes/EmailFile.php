<?php

class EmailFile
{
    private const FILE_NAME= __DIR__ . '/../email_NL.txt';
    private array $emails =[];

    public function __construct(private DuplicateChecker $checker){
        $this->emails = file(self::FILE_NAME, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    }

    public function add(Email $email): void
    {
        // Vérification doublon
        if (in_array($email->getAddressEmail(), $this->emails)) {
            throw new Exception("Cet email est déjà inscrit à notre newsletter");
        }
    
        file_put_contents(self::FILE_NAME, $email->getAddressEmail() . PHP_EOL, FILE_APPEND);
        $this->emails[] = $email->getAddressEmail();
    }   

    public function getEmails(): array
    {
        return $this->emails;
    }
}


