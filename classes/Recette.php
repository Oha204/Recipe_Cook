<?php

class Recette
{
    public const IMG_DIR = "/uploads/img_plat/";

    public function __construct(
        private int    $id,
        private string $titre,
        private string $auteur,
        private string $date_publi,
        private string $img,
        private array  $categories,
        private array  $ingredients,
        private array  $ustensiles,
        private array  $preparation,
        private bool   $active
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function getAuteur(): string
    {
        return $this->auteur;
    }

    public function getImg(): string
    {
        return self::IMG_DIR . $this->img;
    }

    public function getCategories(): array
    {
        return $this->categories;
    }

    public function getIngredients(): array
    {
        return $this->ingredients;
    }

    public function getUstensiles(): array
    {
        return $this->ustensiles;
    }

    public function getPreparation(): array
    {
        return $this->preparation;
    }

    public function getDatepubli() : string
    {
        return $this->date_publi;
    }

    public function getActive() : bool
    {
        return $this->active;
    }
}
