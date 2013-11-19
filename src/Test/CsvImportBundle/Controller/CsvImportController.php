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
use Test\CsvImportBundle\Entity\OrdersData;

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

    public function saveAction()
    {
        $request = $this->getRequest();
        $rowData = $request->get('rowData');
        $saveMapping = $request->get('saveMaping');

        if ($saveMapping) {
            $mapping = $request->get('mapping');
        }

        if(!empty($rowData)) {

            foreach ($rowData as $val) {
                $order = new OrdersData();
                $orderClassVars = get_class_vars(get_class($order));
                unset($orderClassVars['id']);

                $options = array_merge($orderClassVars, $val);

                foreach ($options as $field => $value) {
                    $methodName = 'set' . ucfirst($field);

                    if (method_exists($order, $methodName)) {
                        $code = '$order->' . $methodName . '("' . $value . '");';
                        eval($code);
                    }
                }

                $em = $this->getDoctrine()->getManager();
                $em->persist($order);
                $em->flush();
            }
        }

        exit;
    }
}