<?php
/**
 * �������
 */
interface Factory
{

    /**
     * ���������� �������
     *
     * @return Product
     */
    public function getProduct();
}

/**
 * �������
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

/**
 * ������ �������
 */
class FirstFactory implements Factory
{

    /**
     * ���������� �������
     *
     * @return Product
     */
    public function getProduct()
    {
        return new FirstProduct();
    }
}

/**
 * ������ �������
 */
class SecondFactory implements Factory
{

    /**
     * ���������� �������
     *
     * @return Product
     */
    public function getProduct()
    {
        return new FirstProduct();
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
 *        USING OF FACTORY METHOD
 * =====================================
 */

$factory = new FirstFactory();
$firstProduct = $factory->getProduct();
$factory = new SecondFactory();
$secondProduct = $factory->getProduct();

print_r($firstProduct->getName());
// The first product
print_r($secondProduct->getName());
// Second product