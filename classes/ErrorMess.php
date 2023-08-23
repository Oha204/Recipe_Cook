<?php

class ErrorMess
{
    public const ADMIN_ACCESS_ERROR = 1;
    public const INVALID_CREDENTIALS = 2;
    public const LOGIN_FIELDS_REQUIRED = 3;

    public static function getErrorMessage(int $errorMess): string
    {
        switch ($errorMess) {
        case self::ADMIN_ACCESS_ERROR:
            $result = "Veuillez vous connecter pour accéder à l'administration";
            break;
        case self::INVALID_CREDENTIALS:
            $result = "Votre e-mail ou votre mot de passe n'est pas correct. Veuillez réessayer.";
            break;
        case self::LOGIN_FIELDS_REQUIRED:
            $result = "Tous les champs du formulaire sont obligatoires";
            break;
        default:
            $result = "Une erreur est survenue";
        }

        return $result;
    }
}