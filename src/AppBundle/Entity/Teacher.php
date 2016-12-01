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
 * @ORM\Table(name="teacher")
 */
class Teacher extends Page
{
   /**
    * @ORM\OneToOne(targetEntity="Image")
    * @ORM\JoinColumn(name="image_id", referencedColumn="id")
    */
    private $image;
   /**
    * @ORM\Column(type="text")
    */
    private $description;
} 
