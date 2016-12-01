<?php
namespace AppBundle\Model;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Masterclass;
use AppBundle\Entity\Page;
use AppBundle\Entity\Teacher;
use AppBundle\Entity\Image;
use Symfony\Component\Form\Forms;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
class MasterclassModel
{
    public function createForm($isEdit = FALSE)
    {
        $formFactory = Forms::createFormFactory();
        return $formFactory->createBuilder()
            ->setAction('/add/gallery')
            ->add('title', TextType::class, ['label'=>'Заголовок'])
            ->add('url', TextType::class)
            ->add('teacher', ChoiceType::class, [
                'choices' => ['Преподаватель' => 1],
                'label' => 'Преподаватель'
            ])
            ->add('meta_keywords', TextareaType::class)
            ->add('meta_description', TextareaType::class)
            ->add('image', FileType::class, ['label' => 'Загрузить изображение'])
            ->getForm();
    }
    public function createMasterclass($doctrine, $data)
    {
        $page = new Page();
        $page->setTitle($data['title']);
        $page->setUrl($data['url']);
        $page->setMetaKeywords($data['meta_keywords']);
        $page->setMetaDescription($data['meta_description']);
        $em = $doctrine->getManager();
        $em->presist($page);
        $em->flush($page);
        $teacher = $doctrine->getRepository('AppBundle:Teacher')
            ->findOne($data['teacher']);

    }
}
