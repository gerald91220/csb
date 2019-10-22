<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProgrammesRepository")
 */
class Programmes
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
     * @ORM\Column(type="text")
     */
    private $contenu;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateUpdate;
    
    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $file;

    /**
     * @Vich\UploadableField(mapping="programmes_file", fileNameProperty="file")
     * @var File
     */
    private $fileFile;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\SousTheme", inversedBy="programmes")
     */
    private $sousTheme;

    public function __construct()
    {
        $this->sousTheme = new ArrayCollection();
    }
    
    
    function getFile() {
        return $this->file;
    }

    function getFileFile(): File {
        return $this->fileFile;
    }

    function setFile($file) {
        $this->file = $file;
    }

    function setFileFile(File $fileFile) {
        $this->fileFile = $fileFile;
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

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getDateUpdate(): ?\DateTimeInterface
    {
        return $this->dateUpdate;
    }

    public function setDateUpdate(\DateTimeInterface $dateUpdate): self
    {
        $this->dateUpdate = $dateUpdate;

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
        }

        return $this;
    }

    public function removeSousTheme(sousTheme $sousTheme): self
    {
        if ($this->sousTheme->contains($sousTheme)) {
            $this->sousTheme->removeElement($sousTheme);
        }

        return $this;
    }
}
