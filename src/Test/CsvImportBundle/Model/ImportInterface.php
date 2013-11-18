<?php
/**
 * Created by PhpStorm.
 * User: luigi.aron
 * Date: 18/11/13
 * Time: 19:07
 * Contact email: aronluigi@gmail.com
 */
namespace Test\CsvImportBundle\Model;

interface ImportInterface {
    /**
     * @return array
     */
    public function getFields();

    /**
     * @param int $orderNr
     * @return $this
     */
    public function setOrderNr($orderNr);

    /**
     * @param int $orderId
     * @return $this
     */
    public function setOrderId($orderId);

    /**
     * @param string $firstName
     * @return $this
     */
    public function setFirstName($firstName);

    /**
     * @param string $lastName
     * @return $this
     */
    public function setLastName($lastName);

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail($email);

    /**
     * @param string $street
     * @return $this
     */
    public function setStreet1($street);

    /**
     * @param string $street
     * @return $this
     */
    public function setStreet2($street);

    /**
     * @param string $zip
     * @return $this
     */
    public function setZip($zip);

    /**
     * @param string $city
     * @return $this
     */
    public function setCity($city);

    /**
     * @param string $country
     * @return $this
     */
    public function setCountry($country);

    /**
     * @param int $qty
     * @return $this
     */
    public function setQty($qty);

    /**
     * @param int $price
     * @return $this
     */
    public function setPrice($price);
}