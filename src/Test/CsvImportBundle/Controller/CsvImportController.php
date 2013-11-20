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
use Test\CsvImportBundle\Entity\Customer;
use Test\CsvImportBundle\Entity\ImportModel;
use Test\CsvImportBundle\Entity\OrdersData;
use Test\CsvImportBundle\Entity\OrdersItems;
use Test\CsvImportBundle\Entity\Product;
use Test\CsvImportBundle\Entity\Mapping;

class CsvImportController extends Controller
{
    public function indexAction($csvId)
    {
        $csvFile = $this->getDoctrine()
            ->getRepository('TestCsvImportBundle:Document')
            ->findBy(array('id' => $csvId));

        $mapping = $this->getDoctrine()
            ->getRepository('TestCsvImportBundle:Mapping')
            ->findAll();

        $importMode = new ImportModel();

        return $this->render('TestCsvImportBundle:CsvImport:index.html.twig', array(
            'csvFile' => current($csvFile),
            'mappingFields' => $importMode,
            'mapping' => $mapping
        ));
    }

    public function saveAction()
    {
        $request = $this->getRequest();
        $rowData = $request->get('rowData');
        $saveMapping = $request->get('saveMapping');

        if (!empty($saveMapping)) {
            $this->saveImportMapping($saveMapping);
        }

        $this->saveImportData($rowData);

        exit;
    }

    public function saveImportMapping(array $mapingData)
    {
        $mapping = new Mapping();
        $mapping->setName(current(array_keys($mapingData)))
                ->setData(json_encode(current($mapingData)));

        $em = $this->getDoctrine()->getManager();
        $em->persist($mapping);
        $em->flush();
    }

    public function saveImportData(array $rowData)
    {
        if(!empty($rowData)) {
            foreach ($rowData as $options) {
                $order = new OrdersData();

                foreach ($options as $field => $value) {
                    $methodName = 'set' . ucfirst($field);

                    if (method_exists($order, $methodName)) {
                        $code = '$order->' . $methodName . '("' . addslashes($value) . '");';
                        eval($code);
                    }
                }

                $em = $this->getDoctrine()->getManager();
                $em->persist($order);
                $em->flush();

                $this->saveOrdersItemsRow($options, $order->getId());
                $this->saveProductRow($options, $order->getId());
                $this->saveCustomerRow($options, $order->getId());
            }
        }
    }

    public function saveOrdersItemsRow(array $options, $orderDataId = null)
    {
        if (empty($orderDataId)) {
            exit('CsvImportController -> saveOrdersItemsRow() is ID is missing');
        }

        $options['param'] = $orderDataId;
        $orderItems = new OrdersItems();

        foreach ($options as $field => $value) {
            $methodName = 'set' . ucfirst($field);

            if (method_exists($orderItems, $methodName)) {
                $code = '$orderItems->' . $methodName . '("' . addslashes($value) . '");';
                eval($code);
            }
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($orderItems);
        $em->flush();
    }

    public function saveProductRow(array $options, $orderDataId = null)
    {
        if (empty($orderDataId)) {
            exit('CsvImportController -> saveProductRow() is ID is missing');
        }

        $options['param'] = $orderDataId;
        $product = new Product();

        foreach ($options as $field => $value) {
            $methodName = 'set' . ucfirst($field);

            if (method_exists($product, $methodName)) {
                $code = '$product->' . $methodName . '("' . addslashes($value) . '");';
                eval($code);
            }
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();
    }

    public function saveCustomerRow(array $options, $orderDataId = null)
    {
        if (empty($orderDataId)) {
            exit('CsvImportController -> saveCustomerRow() is ID is missing');
        }

        $options['param'] = $orderDataId;
        $customer = new Customer();

        foreach ($options as $field => $value) {
            $methodName = 'set' . ucfirst($field);

            if (method_exists($customer, $methodName)) {
                $code = '$customer->' . $methodName . '("' . addslashes($value) . '");';
                eval($code);
            }
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($customer);
        $em->flush();
    }
}