<?php
/**
 * ��� ��������
 */
class Factory
{

    /**
     * @var Product[]
     */
    protected static $products = array();


    /**
     * ��������� ������� � ���
     *
     * @param Product $product
     * @return void
     */
    public static function pushProduct(Product $product)
    {
        self::$products[$product->getId()] = $product;
    }

    /**
     * ���������� ������� �� ����
     *
     * @param integer|string $id - ������������� ��������
     * @return Product $product
     */
    public static function getProduct($id)
    {
        return isset(self::$products[$id]) ? self::$products[$id] : null;
    }

    /**
     * ������� ������� �� ����
     *
     * @param integer|string $id - ������������� ��������
     * @return void
     */
    public static function removeProduct($id)
    {
        if (isset(self::$products[$id])) {
            unset(self::$products[$id]);
        }
    }
}

class Product
{

    /**
     * @var integer|string
     */
    protected $id;


    public function __construct($id) {
        $this->id = $id;
    }

    /**
     * @return integer|string
     */
    public function getId()
    {
        return $this->id;
    }
}

/*
 * =====================================
 *         USING OF OBJECT POOL
 * =====================================
 */

Factory::pushProduct(new Product('first'));
Factory::pushProduct(new Product('second'));

print_r(Factory::getProduct('first')->getId());
// first
print_r(Factory::getProduct('second')->getId());
// second