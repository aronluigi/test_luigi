<?php
/**
 * Created by PhpStorm.
 * User: luigi.aron
 * Date: 17/11/13
 * Time: 23:57
 * Contact email: aronluigi@gmail.com
 */
namespace Test\CsvImportBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="order_items")
 */
class OrderItems
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $param;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $qty;

    /**
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     */
    protected $price;

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
     * Set param
     *
     * @param integer $param
     * @return OrderItems
     */
    public function setParam($param)
    {
        $this->param = $param;
    
        return $this;
    }

    /**
     * Get param
     *
     * @return integer 
     */
    public function getParam()
    {
        return $this->param;
    }

    /**
     * Set qty
     *
     * @param integer $qty
     * @return OrderItems
     */
    public function setQty($qty)
    {
        $this->qty = $qty;
    
        return $this;
    }

    /**
     * Get qty
     *
     * @return integer 
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return OrderItems
     */
    public function setPrice($price)
    {
        $this->price = $price;
    
        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }
}