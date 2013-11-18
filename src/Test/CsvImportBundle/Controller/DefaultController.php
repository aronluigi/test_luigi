<?php

namespace Test\CsvImportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Test\CsvImportBundle\Entity\Document;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $alert = null;
        $document = new Document();
        $form = $this->createFormBuilder($document)
            ->add('file', 'file', array(
                'label' => false,
                'required' => true,
                'attr' => array('class' => 'file-upload-container'),
            ))
            ->add('Upload', 'submit', array('attr' => array('class' => 'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($document);
            $em->flush();

            $alert = 'File saved';
        }

        return $this->render('TestCsvImportBundle:Default:index.html.twig',
            array(
                'form' => $form->createView(),
                'alert' => $alert
            )
        );
    }

    public function showLogAction()
    {
        $log = $this->getDoctrine()
                ->getRepository('TestCsvImportBundle:Document')
                ->findAll();

        return $this->render('TestCsvImportBundle:Partial:upload-log.html.twig', array('fileLog' => $log));
    }
}
