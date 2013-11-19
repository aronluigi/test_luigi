<?php
/**
 * Created by PhpStorm.
 * User: luigi.aron
 * Date: 18/11/13
 * Time: 18:57
 * Contact email: aronluigi@gmail.com
 */
namespace Test\CsvImportBundle\Entity;

class ImportModel
{
    // OrdersData
    public $orderId = 'Order Id';
    public $orderNr = 'Order Number';
    public $company = 'Company';
    public $streetA = 'Street 1';
    public $streetB = 'Street 2';
    public $streetNr = 'Street Nr';
    public $zip = 'Zip';
    public $city = 'City';
    public $country = 'Country';

    // OrdersItems
    public $qty = 'Quantity';
    public $price = 'Price';

    // Product
    public $sku = 'SKU';
    public $productName = 'Product Name';

    // Customer
    public $firstName = 'First Name';
    public $lastName = 'Last Name';
    public $email = 'Email Address';
    public $phone = 'Telephone Number';
}