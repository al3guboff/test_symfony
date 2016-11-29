<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Extension\Core\Type\TextType;
use Symfony\Component\Extension\Core\Type\TextareaType;
use Symfony\Component\Extension\Core\Type\ButtonType;
use Symfony\Component\Extension\Core\Type\SubmitType;
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
     * @ORM\OneToMany(targetEntity="Image", mappedBy="gallery")
     */
    private $listImage;

    public function createForm($builder, $isEdit = FALSE)
    {
        return $builder
            ->add('title')
            ->add('url')
            ->add('description')
            ->add('meta_keywords')
            ->add('meta_description', TextType::class)
            ->add('add_image', ButtonType::class, ['attr'=>['class'=>'btn btn-info'], 'label' => '<i class="plus"></i> Добавить изображение'])
            ->add('save', SubmitType::class, ['label' => 'Создать галерею'])
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
