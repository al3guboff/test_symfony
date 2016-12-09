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
            ->setAction('/app_dev.php/masterclass')
            ->add('title', TextType::class, ['label'=>'Заголовок'])
            ->add('url', TextType::class)
            ->add('teacher', ChoiceType::class, [
                'choices' => ['Преподаватель' => 1],
                'label' => 'Преподаватель'
            ])
            ->add('meta_keywords', TextareaType::class)
            ->add('meta_description', TextareaType::class)
            ->add('description', TextareaType::class, ['label' => 'Описание мастеркласса'])
            ->add('image', FileType::class, ['label' => 'Загрузить изображение'])
            ->add('submit', SubmitType::class, ['label' => 'Создать'])
            ->getForm();
    }
    public function createMasterclass($doctrine, $data, $fileFactory)
    {
        $isError = FALSE;
        try{
            $fileImage = $fileFactory->getFileUpload($data['image'], 'res/images/mc');
            $newImageFilePath = $fileImage->move();
            $image = Image::createFromFile($newImageFilePath);
            $image->setUrl($fileFactory->getFile($newImageFilePath)->getUrl());
            $em = $doctrine->getManager();
            $em->persist($image);
            $em->flush();
        }catch(Exception $e){
            $isError = TRUE;
            throw $e;
        }
        /*
        $teacher = $doctrine->getRepository('AppBundle:Teacher')
            ->findOne($data['teacher']);
         */
        $teacher = $em->find('AppBundle:Teacher', $data['teacher']);
        $masterclass = new Masterclass();
        $masterclass->setTeacher($teacher);
        $masterclass->setImage($image);
        $masterclass->setTitle($data['title']);
        $masterclass->setUrl($data['url']);
        $masterclass->setH1($data['url']);
        $masterclass->setMetaKeywords($data['meta_keywords']);
        $masterclass->setIsPublic(1);
        $masterclass->setMetaDescription($data['meta_description']);
        $masterclass->setCreateTime(new \Datetime());
        $masterclass->setDescription($data['description']);
        $em->persist($masterclass);
        $em->flush();
    }
}
