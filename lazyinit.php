<?php
/**
 * �����-�� �������
 */
interface Product
{

    /**
     * ���������� �������� ��������
     *
     * @return string
     */
    public function getName();
}

class Factory
{

    /**
     * @var Product
     */
    protected $firstProduct;

    /**
     * @var Product
     */
    protected $secondProduct;


    /**
     * ���������� �������
     *
     * @return Product
     */
    public function getFirstProduct()
    {

        if (!$this->firstProduct) {
            $this->firstProduct = new FirstProduct();
        }
        return $this->firstProduct;
    }

    /**
     * ���������� �������
     *
     * @return Product
     */
    public function getSecondProduct()
    {

        if (!$this->secondProduct) {
            $this->secondProduct = new SecondProduct();
        }
        return $this->secondProduct;
    }
}

/**
 * ������ �������
 */
class FirstProduct implements Product
{

    /**
     * ���������� �������� ��������
     *
     * @return string
     */
    public function getName()
    {
        return 'The first product';
    }
}

/**
 * ������ �������
 */
class SecondProduct implements Product
{

    /**
     * ���������� �������� ��������
     *
     * @return string
     */
    public function getName()
    {
        return 'Second product';
    }
}

/*
 * =====================================
 *      USING OF LAZY INITIALIZATION
 * =====================================
 */

$factory = new Factory();

print_r($factory->getFirstProduct()->getName());
// The first product
print_r($factory->getSecondProduct()->getName());
// Second product
print_r($factory->getFirstProduct()->getName());
// The first product