<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RecipeRepository")
 */
class Recipe
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=800)
     */
    private $ingredients;

    /**
     * @ORM\Column(type="string", length=2500)
     */
    private $steps;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $prepTime;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $skill;

    /**
     * @ORM\Column(type="string", length=16, nullable=true)
     */
    private $method;

    /**
     * @ORM\Column(type="string", length=12, nullable=true)
     */
    private $catagory;

    /**
     * @ORM\Column(type="string", length=12, nullable=true)
     */
    private $meal;

    /**
     * @ORM\Column(type="string", length=8, nullable=true)
     */
    private $season;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $servings;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $image;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    public function getId()
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getIngredients(): ?string
    {
        return $this->ingredients;
    }

    public function setIngredients(string $ingredients): self
    {
        $this->ingredients = $ingredients;

        return $this;
    }

    public function getSteps(): ?string
    {
        return $this->steps;
    }

    public function setSteps(string $steps): self
    {
        $this->steps = $steps;

        return $this;
    }

    public function getPrepTime(): ?int
    {
        return $this->prepTime;
    }

    public function setPrepTime(?int $prepTime): self
    {
        $this->prepTime = $prepTime;

        return $this;
    }

    public function getSkill(): ?int
    {
        return $this->skill;
    }

    public function setSkill(?int $skill): self
    {
        $this->skill = $skill;

        return $this;
    }

    public function getMethod(): ?string
    {
        return $this->method;
    }

    public function setMethod(?string $method): self
    {
        $this->method = $method;

        return $this;
    }

    public function getCatagory(): ?string
    {
        return $this->catagory;
    }

    public function setCatagory(?string $catagory): self
    {
        $this->catagory = $catagory;

        return $this;
    }

    public function getMeal(): ?string
    {
        return $this->meal;
    }

    public function setMeal(?string $meal): self
    {
        $this->meal = $meal;

        return $this;
    }

    public function getSeason(): ?string
    {
        return $this->season;
    }

    public function setSeason(?string $season): self
    {
        $this->season = $season;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getServings(): ?int
    {
        return $this->servings;
    }

    public function setServings(?int $servings): self
    {
        $this->servings = $servings;

        return $this;
    }
}
