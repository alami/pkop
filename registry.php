<?php
/**
 * ������
 */
class Product
{

    /**
     * @var mixed[]
     */
    protected static $data = array();


    /**
     * ��������� �������� � ������
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public static function set($key, $value)
    {
        self::$data[$key] = $value;
    }

    /**
     * ���������� �������� �� ������� �� �����
     *
     * @param string $key
     * @return mixed
     */
    public static function get($key)
    {
        return isset(self::$data[$key]) ? self::$data[$key] : null;
    }

    /**
     * ������� �������� �� ������� �� �����
     *
     * @param string $key
     * @return void
     */
    final public static function removeProduct($key)
    {
        if (isset(self::$data[$key])) {
            unset(self::$data[$key]);
        }
    }
}
/*
 * =====================================
 *           USING OF REGISTRY
 * =====================================
 */

Product::set('name', 'First product');

print_r(Product::get('name'));
// First product

