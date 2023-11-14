<?php
require_once __DIR__ . '/../config/database.php';

class Contain
{
    private int $id_cocktail;
    private int $id_ingredients;

    public function get_id_cocktail(): int
    {
        return $this->id_cocktail;
    }
    public function set_id_cocktail($id_cocktail)
    {
        $this->id_cocktail = $id_cocktail;
    }

    public function get_id_ingredients(): int
    {
        return $this->id_ingredients;
    }
    public function set_id_ingredients($id_ingredients)
    {
        $this->id_ingredients = $id_ingredients;
    }

}