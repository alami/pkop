<?php
/**
 * �����-������ ���� ������������
 */
class Config
{
    public static $factory = 1;
}

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

/**
 * ����������� �������
 */
abstract class AbstractFactory
{

    /**
     * ���������� �������
     *
     * @return AbstractFactory - �������� ������
     * @throws Exception
     */
    public static function getFactory()
    {
        switch (Config::$factory) {
            case 1:
                return new FirstFactory();
            case 2:
                return new SecondFactory();
        }
        throw new Exception('Bad config');
    }

    /**
     * ���������� �������
     *
     * @return Product
     */
    abstract public function getProduct();
}

/*
 * =====================================
 *             FIRST FAMILY
 * =====================================
 */

class FirstFactory extends AbstractFactory
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
 * ������� ������ �������
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
        return 'The product from the first factory';
    }
}

/*
 * =====================================
 *             SECOND FAMILY
 * =====================================
 */

class SecondFactory extends AbstractFactory
{

    /**
     * ���������� �������
     *
     * @return Product
     */
    public function getProduct()
    {
        return new SecondProduct();
    }
}

/**
 * ������� ������ �������
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
        return 'The product from second factory';
    }
}

/*
 * =====================================
 *       USING OF ABSTRACT FACTORY
 * =====================================
 */

$firstProduct = AbstractFactory::getFactory()->getProduct();
Config::$factory = 2;
$secondProduct = AbstractFactory::getFactory()->getProduct();

print_r($firstProduct->getName());
// The first product from the first factory
print_r($secondProduct->getName());
// Second product from second factory