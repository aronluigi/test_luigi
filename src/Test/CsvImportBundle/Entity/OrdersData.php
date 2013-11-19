<?php

namespace Test\CsvImportBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrdersData
 *
 * @ORM\Table(name="orders")
 * @ORM\Entity(repositoryClass="Test\CsvImportBundle\Entity\OrdersDataRepository")
 */
class OrdersData
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="orderId", type="string", length=255, nullable=true)
     */
    private $orderId;

    /**
     * @var string
     *
     * @ORM\Column(name="orderNr", type="string", length=255, nullable=true)
     */
    private $orderNr;

    /**
     * @var string
     *
     * @ORM\Column(name="company", type="string", length=255, nullable=true)
     */
    private $company;

    /**
     * @var string
     *
     * @ORM\Column(name="streetA", type="text", nullable=true)
     */
    private $streetA;

    /**
     * @var string
     *
     * @ORM\Column(name="streetB", type="text", nullable=true)
     */
    private $streetB;

    /**
     * @var string
     *
     * @ORM\Column(name="zip", type="string", length=255, nullable=true)
     */
    private $zip;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255, nullable=true)
     */
    private $country;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set orderId
     *
     * @param string $orderId
     * @return OrdersData
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    
        return $this;
    }

    /**
     * Get orderId
     *
     * @return string 
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Set orderNr
     *
     * @param string $orderNr
     * @return OrdersData
     */
    public function setOrderNr($orderNr)
    {
        $this->orderNr = $orderNr;
    
        return $this;
    }

    /**
     * Get orderNr
     *
     * @return string 
     */
    public function getOrderNr()
    {
        return $this->orderNr;
    }

    /**
     * Set company
     *
     * @param string $company
     * @return OrdersData
     */
    public function setCompany($company)
    {
        $this->company = $company;
    
        return $this;
    }

    /**
     * Get company
     *
     * @return string 
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set streetA
     *
     * @param string $streetA
     * @return OrdersData
     */
    public function setStreetA($streetA)
    {
        $this->streetA = $streetA;
    
        return $this;
    }

    /**
     * Get streetA
     *
     * @return string 
     */
    public function getStreetA()
    {
        return $this->streetA;
    }

    /**
     * Set streetB
     *
     * @param string $streetB
     * @return OrdersData
     */
    public function setStreetB($streetB)
    {
        $this->streetB = $streetB;
    
        return $this;
    }

    /**
     * Get streetB
     *
     * @return string 
     */
    public function getStreetB()
    {
        return $this->streetB;
    }

    /**
     * Set zip
     *
     * @param string $zip
     * @return OrdersData
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    
        return $this;
    }

    /**
     * Get zip
     *
     * @return string 
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return OrdersData
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return OrdersData
     */
    public function setCountry($country)
    {
        $this->country = $country;
    
        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }
}