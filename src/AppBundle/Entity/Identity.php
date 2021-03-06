<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Identity
 *
 * @ORM\Table(name="identity")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\IdentityRepository")
 * @Vich\Uploadable
 */
class Identity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    /**
     * @var File
     * @Vich\UploadableField(mapping="upload_identity", fileNameProperty="image")
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="linkedin", type="string", length=255, nullable=true)
     */
    private $linkedin;

    /**
     * @var string
     *
     * @ORM\Column(name="linkedinImage", type="string", length=255, nullable=true)
     */
    private $linkedinImage;

    /**
     * @var File
     * @Vich\UploadableField(mapping="upload_identity", fileNameProperty="linkedinImage")
     */
    private $linkedinImageFile;

    /**
     * @var string
     *
     * @ORM\Column(name="github", type="string", length=255, nullable=true)
     */
    private $github;

    /**
     * @var string
     *
     * @ORM\Column(name="githubImage", type="string", length=255, nullable=true)
     */
    private $githubImage;

    /**
     * @var File
     * @Vich\UploadableField(mapping="upload_identity", fileNameProperty="githubImage")
     */
    private $githubImageFile;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Identity
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Identity
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Identity
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     * @return Identity
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Identity
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set linkedin
     *
     * @param string $linkedin
     *
     * @return Identity
     */
    public function setLinkedin($linkedin)
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    /**
     * Get linkedin
     *
     * @return string
     */
    public function getLinkedin()
    {
        return $this->linkedin;
    }

    /**
     * Set linkedinImage
     *
     * @param string $linkedinImage
     *
     * @return Identity
     */
    public function setLinkedinImage($linkedinImage)
    {
        $this->linkedinImage = $linkedinImage;

        return $this;
    }

    /**
     * Get linkedinImage
     *
     * @return string
     */
    public function getLinkedinImage()
    {
        return $this->linkedinImage;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $linkedinImage
     * @return Identity
     */
    public function setLinkedinImageFile(File $linkedinImage = null)
    {
        $this->linkedinImageFile = $linkedinImage;

        if ($linkedinImage) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getLinkedinImageFile()
    {
        return $this->linkedinImageFile;
    }

    /**
     * Set github
     *
     * @param string $github
     *
     * @return Identity
     */
    public function setGithub($github)
    {
        $this->github = $github;

        return $this;
    }

    /**
     * Get github
     *
     * @return string
     */
    public function getGithub()
    {
        return $this->github;
    }

    /**
     * Set githubImage
     *
     * @param string $githubImage
     *
     * @return Identity
     */
    public function setGithubImage($githubImage)
    {
        $this->githubImage = $githubImage;

        return $this;
    }

    /**
     * Get githubImage
     *
     * @return string
     */
    public function getGithubImage()
    {
        return $this->githubImage;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $githubImage
     * @return Identity
     */
    public function setGithubImageFile(File $githubImage = null)
    {
        $this->githubImageFile = $githubImage;

        if ($githubImage) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getGithubImageFile()
    {
        return $this->githubImageFile;
    }
}
