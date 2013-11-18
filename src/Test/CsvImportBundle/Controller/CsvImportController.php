<?php
/**
 * Created by PhpStorm.
 * User: luigi.aron
 * Date: 18/11/13
 * Time: 16:23
 * Contact email: aronluigi@gmail.com
 */
namespace Test\CsvImportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Test\CsvImportBundle\Entity\ImportModel;

class CsvImportController extends Controller
{
    public function indexAction($csvId)
    {
        $csvFile = $this->getDoctrine()
            ->getRepository('TestCsvImportBundle:Document')
            ->findBy(array('id' => $csvId));

        $importMode = new ImportModel();

        return $this->render('TestCsvImportBundle:CsvImport:index.html.twig', array(
            'csvFile' => current($csvFile),
            'mappingFields' => $importMode->getFields()
        ));
    }
}