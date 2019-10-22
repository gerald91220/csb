<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ThemesRepository")
 */
class Themes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SousTheme", mappedBy="themes")
     */
    private $sousTheme;

    public function __construct()
    {
        $this->sousTheme = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * @return Collection|sousTheme[]
     */
    public function getSousTheme(): Collection
    {
        return $this->sousTheme;
    }

    public function addSousTheme(sousTheme $sousTheme): self
    {
        if (!$this->sousTheme->contains($sousTheme)) {
            $this->sousTheme[] = $sousTheme;
            $sousTheme->setThemes($this);
        }

        return $this;
    }

    public function removeSousTheme(sousTheme $sousTheme): self
    {
        if ($this->sousTheme->contains($sousTheme)) {
            $this->sousTheme->removeElement($sousTheme);
            // set the owning side to null (unless already changed)
            if ($sousTheme->getThemes() === $this) {
                $sousTheme->setThemes(null);
            }
        }

        return $this;
    }
}
