<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImagesRepository")
 */
class Images
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $fichier;
    
    /**
     * @Vich\UploadableField(mapping="fichier_image", fileNameProperty="fichier")
     * @var File
     */
    private $fichierFile;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Evenements", inversedBy="photos")
     */
    private $evenements;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Articles", inversedBy="fichier")
     */
    private $articles;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="fichier")
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;
    
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFichier(): ?string
    {
        return $this->fichier;
    }

    public function setFichier(string $fichier): self
    {
        $this->fichier = $fichier;

        return $this;
    }

    public function getEvenements(): ?Evenements
    {
        return $this->evenements;
    }

    public function setEvenements(?Evenements $evenements): self
    {
        $this->evenements = $evenements;

        return $this;
    }

    public function getArticles(): ?Articles
    {
        return $this->articles;
    }

    public function setArticles(?Articles $articles): self
    {
        $this->articles = $articles;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
