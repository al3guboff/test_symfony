<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Page;
use AppBundle\Entity\Gallery;
use AppBundle\Entity\Masterclass;

class DefaultController extends Controller
{
    /**
     * @Route("/test", name="test_page")
     */
    public function testAction(Request $request)
    {
        $mc = new Gallery();
        $mc->setUrl('/gallery1.html');
        $mc->setTitle('gallery 1');
        $mc->setH1('gallery 1');
        $mc->setCreateTime(new \Datetime());
        $mc->setIsPublic(TRUE);
        $mc->setMetaKeywords('saida alid laid fl sd odfija aidfasdf ');
        $mc->setMetaDescription('sfl sd odfija aidfasdf 33dfda sdaf9wr3 sdifdsf ');
        $mc->setDescription('ldfa aisdfa aaij lajefdsa iejf38 a834r83 ladfds 3878 dsfa');
        $em = $this->getDoctrine()->getManager();
        $em->persist($mc);
        $em->flush();
        /*
        $mc = new Masterclass();
        $mc->setUrl('/mc3.html');
        $mc->setTitle('masterclass 3');
        $mc->setH1('masterclass 3');
        $mc->setCreateTime(new \Datetime());
        $mc->setIsPublic(TRUE);
        $mc->setMetaKeywords('sfl sd odfija aidfasdf ');
        $mc->setMetaDescription('sfl sd odfija aidfasdf 33dfda sdaf9wr3 sdifdsf ');
        $mc->setImage('/images/mc3.jpg');
        $mc->setTeacherName('Natali');
        $em = $this->getDoctrine()->getManager();
        $em->persist($mc);
        $em->flush();
        $mc = new Page();
        $mc->setUrl('/page1.html');
        $mc->setTitle('page 1');
        $mc->setH1('page 1');
        $mc->setCreateTime(new \Datetime());
        $mc->setIsPublic(TRUE);
        $mc->setMetaKeywords('saida alid laid fl sd odfija aidfasdf ');
        $mc->setMetaDescription('sfl sd odfija aidfasdf 33dfda sdaf9wr3 sdifdsf ');
        $em = $this->getDoctrine()->getManager();
        $em->persist($mc);
        $em->flush();
         */
        ob_start();
        echo '<pre>';
        var_dump($mc);
        $strOut = ob_get_clean();
        return new Response($strOut);
    }
    /**
     * @Route("/form", name="form")
     */
    public function formAction(Request $request)
    {
        $formBuilder = $this->createFormBuilder();
        $form = (new Gallery())->createForm($formBuilder, FALSE);
        return $this->render('default/form.html.twig', ['form' => $form->createView(), 'title' => 'Создать галерею']);
    }
    /**
     * @Route("/masterclass", name="add_masterclass")
     */
    public function masterclassAction(Request $request)
    {
        $form = (new Masterclass())->createForm();
        return $this->render('default/form_masterclass.html.twig', ['form' => $form->createView(), 'title' => 'Создать мастеркласс']);

    }
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

}
