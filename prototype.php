<?php
/**
 * �����-�� �������
 */
interface Product
{
}

/**
 * �����-�� �������
 */
class Factory
{

    /**
     * @var Product
     */
    private $product;


    /**
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * ���������� ����� ������� ���� ������������
     *
     * @return Product
     */
    public function getProduct()
    {
        return clone $this->product;
    }
}

/**
 * �������
 */
class SomeProduct implements Product
{
    public $name;
}

/*
 * =====================================
 *          USING OF PROTOTYPE
 * =====================================
 */

$prototypeFactory = new Factory(new SomeProduct());

$firstProduct = $prototypeFactory->getProduct();
$firstProduct->name = 'The first product';

$secondProduct = $prototypeFactory->getProduct();
$secondProduct->name = 'Second product';

print_r($firstProduct->name);
// The first product
print_r($secondProduct->name);
// Second product