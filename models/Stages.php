<?php
require_once __DIR__ . '/../config/database.php';

class Stages
{
    private int $id_stages;
    private string $stage;
    private int $id_cocktail;

    public function get_id_stages(): int
    {
        return $this->id_stages;
    }
    public function set_id_stages($id_stages)
    {
        $this->id_stages = $id_stages;
    }

    public function get_stage(): string
    {
        return $this->stage;
    }
    public function set_stage($stage)
    {
        $this->stage = $stage;
    }

    public function get_id_cocktail(): int
    {
        return $this->id_cocktail;
    }
    public function set_id_cocktail($id_cocktail)
    {
        $this->id_cocktail = $id_cocktail;
    }
}