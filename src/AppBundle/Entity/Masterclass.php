<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Page;
use Symfony\Component\Form\Forms;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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

    public function createForm($isEdit = FALSE)
    {
        $formFactory = Forms::createFormFactory();
        return $formFactory->createBuilder()
            ->setAction('/add/gallery')
            ->add('title', TextType::class, ['label'=>'Заголовок'])
            ->add('url', TextType::class)
            ->add('teacher', ChoiceType::class, [
                'choices' => ['Наталия' => 1],
                'label' => 'Преподаватель'
            ])
            ->add('meta_keywords', TextareaType::class)
            ->add('meta_description', TextareaType::class)
            ->add('image', FileType::class, ['label' => 'Загрузить изображение'])
            ->getForm();
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
