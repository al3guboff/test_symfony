<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Page;
/**
 * @ORM\Entity
 * @ORM\Table(name="masterclass")
 */
class Masterclass extends Page
{
    /**
     * @ORM\Column(type="string")
     */
    protected $image;

    /**
     * @ORM\Column(type="string")
     */
    protected $teacherName;

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Masterclass
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
     * Set teacherName
     *
     * @param string $teacherName
     *
     * @return Masterclass
     */
    public function setTeacherName($teacherName)
    {
        $this->teacherName = $teacherName;

        return $this;
    }

    /**
     * Get teacherName
     *
     * @return string
     */
    public function getTeacherName()
    {
        return $this->teacherName;
    }
}
