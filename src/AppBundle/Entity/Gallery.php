<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Entity\Page;
/**
 * @ORM\Entity
 * @ORM\Table(name="gallery")
 */
class Gallery extends Page
{
    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="Image")
     * @ORM\JoinTable(name="gallery_image_rel",
     *          joinColumns={@ORM\JoinColumn(name="gallery_id", referencedColumnName="id")},
     *          inverseJoinColumns={@ORM\JoinColumn(name="image_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $listImage;

    public function createForm($builder, $isEdit = FALSE)
    {
        return $builder
            ->setAction('/add/gallery')
            ->add('title', TextType::class, ['label'=>'Заголовок'])
            ->add('url', TextType::class)
            ->add('description', TextareaType::class)
            ->add('meta_keywords', TextareaType::class)
            ->add('meta_description', TextareaType::class)
            ->getForm();
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Gallery
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
     * Constructor
     */
    public function __construct()
    {
        $this->listImage = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add listImage
     *
     * @param \AppBundle\Entity\Image $listImage
     *
     * @return Gallery
     */
    public function addListImage(\AppBundle\Entity\Image $listImage)
    {
        $this->listImage[] = $listImage;

        return $this;
    }

    /**
     * Remove listImage
     *
     * @param \AppBundle\Entity\Image $listImage
     */
    public function removeListImage(\AppBundle\Entity\Image $listImage)
    {
        $this->listImage->removeElement($listImage);
    }

    /**
     * Get listImage
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getListImage()
    {
        return $this->listImage;
    }
}
