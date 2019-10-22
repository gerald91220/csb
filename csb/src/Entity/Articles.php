<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticlesRepository")
 */
class Articles
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
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateUpdate;
    
    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="articles_image", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Images", mappedBy="articles")
     */
    private $fichier;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SousTheme", inversedBy="articles")
     */
    private $soustheme;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Description;

    public function __construct()
    {
        $this->fichier = new ArrayCollection();
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

    public function setDateUpdate(?\DateTimeInterface $dateUpdate): self
    {
        $this->dateUpdate = $dateUpdate;

        return $this;
    }
    function getImage() {
        return $this->image;
    }

    function getImageFile(): File {
        return $this->imageFile;
    }

    function setImage($image) {
        $this->image = $image;
    }

    function setImageFile(File $imageFile) {
        $this->imageFile = $imageFile;
    }

    /**
     * @return Collection|images[]
     */
    public function getFichier(): Collection
    {
        return $this->fichier;
    }

    public function addFichier(images $fichier): self
    {
        if (!$this->fichier->contains($fichier)) {
            $this->fichier[] = $fichier;
            $fichier->setArticles($this);
        }

        return $this;
    }

    public function removeFichier(images $fichier): self
    {
        if ($this->fichier->contains($fichier)) {
            $this->fichier->removeElement($fichier);
            // set the owning side to null (unless already changed)
            if ($fichier->getArticles() === $this) {
                $fichier->setArticles(null);
            }
        }

        return $this;
    }

    public function getSoustheme(): ?sousTheme
    {
        return $this->soustheme;
    }

    public function setSoustheme(?sousTheme $soustheme): self
    {
        $this->soustheme = $soustheme;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }


}
