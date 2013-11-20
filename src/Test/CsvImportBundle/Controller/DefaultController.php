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

            return $this->redirect($this->generateUrl('test_csv_import_csv_import', array('csvId' => $document->getId())));
        }

        $rep = $this->getDoctrine()->getRepository('TestCsvImportBundle:OrdersData');
        $query = $rep->createQueryBuilder('e')
                    ->select('
                        e.id,
                        e.orderId,
                        e.orderNr,
                        e.company,
                        e.streetA,
                        e.streetB,
                        e.zip,
                        e.city,
                        e.country,
                        i.qty,
                        i.price,
                        p.sku,
                        p.productName,
                        c.firstName,
                        c.lastName,
                        c.email,
                        c.phone')
                    ->leftJoin('TestCsvImportBundle:OrdersItems', 'i', 'WITH', 'i.param = e.id')
                    ->leftJoin('TestCsvImportBundle:Product', 'p', 'WITH', 'p.param = e.id')
                    ->leftJoin('TestCsvImportBundle:Customer', 'c', 'WITH', 'c.param = e.id')
                    ->getQuery();

        $ordersData = $query->getArrayResult();

        return $this->render('TestCsvImportBundle:Default:index.html.twig',
            array(
                'form' => $form->createView(),
                'alert' => $alert,
                'orders' => $ordersData
            )
        );
    }

    public function showLogAction()
    {
        $log = $this->getDoctrine()
                ->getRepository('TestCsvImportBundle:Document')
                ->findBy(array(), array('date' => 'DESC'));

        return $this->render('TestCsvImportBundle:Partial:upload-log.html.twig', array('fileLog' => $log));
    }
}
