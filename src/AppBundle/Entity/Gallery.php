<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
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
    protected $description;

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
}
