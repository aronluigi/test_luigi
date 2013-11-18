<?php
/**
 * Created by PhpStorm.
 * User: luigi.aron
 * Date: 18/11/13
 * Time: 18:57
 * Contact email: aronluigi@gmail.com
 */
namespace Test\CsvImportBundle\Entity;

use Test\CsvImportBundle\Model\ImportInterface;

class ImportModel implements ImportInterface
{

    public $orderNr;
    public $orderId;
    public $firstName;
    public $lastName;
    public $email;
    public $company;
    public $street1;
    public $street2;
    public $zip;
    public $city;
    public $country;

    public $qty;
    public $price;

    public $fields = array(
        'orderId' => 'Order Id',
        'orderNr' => 'Order Number',
        'firstName' => 'First Name',
        'lastName' => 'Last Name',
        'email' => 'Email',
        'company' => 'Company',
        'street1' => 'Street 1',
        'street2' => 'Street 2',
        'zip' => 'Zip',
        'city' => 'City',
        'country' => 'Country',
        'qty' => 'Quantity',
        'price' => 'Price'
    );

    /**
     * @return array
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @param int $orderNr
     * @return $this
     */
    public function setOrderNr($orderNr)
    {
        $this->orderNr = $orderNr;
        return $this;
    }

    /**
     * @param int $orderId
     * @return $this
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @param string $firstName
     * @return $this
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @param string $lastName
     * @return $this
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @param string $street
     * @return $this
     */
    public function setStreet1($street)
    {
        $this->street1 = $street;
        return $this;
    }

    /**
     * @param string $street
     * @return $this
     */
    public function setStreet2($street)
    {
        $this->street2 = $street;
        return $this;
    }

    /**
     * @param string $zip
     * @return $this
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
        return $this;
    }

    /**
     * @param string $city
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @param string $country
     * @return $this
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @param int $qty
     * @return $this
     */
    public function setQty($qty)
    {
        $this->qty = $qty;
        return $this;
    }

    /**
     * @param int $price
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }
}