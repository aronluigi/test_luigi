<?php
/**
 * Created by PhpStorm.
 * User: luigi.aron
 * Date: 17/11/13
 * Time: 16:23
 * Contact email: aronluigi@gmail.com
 */
namespace Test\CsvImportBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="order")
 */
class Order
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\ManyToOne(targetEntity="OrderItems")
     * @ORM\JoinColumn(name="param", referencedColumnName="id")
     */
    protected $id;

    /**
     * @ORM\Column(name="order_nr", type="string", length=250)
     */
    protected $orderNr;

    /**
     * @ORM\Column(name="first_name", type="string", length=250)
     */
    protected $firstName;

    /**
     * @ORM\Column(name="last_name", type="string", length=250)
     */
    protected $lastName;

    /**
     * @ORM\Column(name="email_address", type="string", length=250)
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=250)
     */
    protected $company;

    /**
     * @ORM\Column(type="string", length=250)
     */
    protected $street1;

    /**
     * @ORM\Column(type="string", length=250)
     */
    protected $street2;

    /**
     * @ORM\Column(type="string", length=250)
     */
    protected $zip;

    /**
     * @ORM\Column(type="string", length=250)
     */
    protected $country;

    /**
     * @ORM\Column(type="string", length=250)
     */
    protected $city;

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
     * Set orderNr
     *
     * @param string $orderNr
     * @return Order
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
     * Set firstName
     *
     * @param string $firstName
     * @return Order
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    
        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Order
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    
        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Order
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set company
     *
     * @param string $company
     * @return Order
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
     * Set street1
     *
     * @param string $street1
     * @return Order
     */
    public function setStreet1($street1)
    {
        $this->street1 = $street1;
    
        return $this;
    }

    /**
     * Get street1
     *
     * @return string 
     */
    public function getStreet1()
    {
        return $this->street1;
    }

    /**
     * Set street2
     *
     * @param string $street2
     * @return Order
     */
    public function setStreet2($street2)
    {
        $this->street2 = $street2;
    
        return $this;
    }

    /**
     * Get street2
     *
     * @return string 
     */
    public function getStreet2()
    {
        return $this->street2;
    }

    /**
     * Set zip
     *
     * @param string $zip
     * @return Order
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
     * Set country
     *
     * @param string $country
     * @return Order
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

    /**
     * Set city
     *
     * @param string $city
     * @return Order
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
}