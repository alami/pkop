<?php
/**
 * ��������
 */
final class Product
{

    /**
     * @var self
     */
    private static $instance;

    /**
     * @var mixed
     */
    public $a;


    /**
     * ���������� ��������� ����
     *
     * @return self
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * ����������� ������
     */
    private function __construct()
    {
    }

    /**
     * ������������ ���������
     */
    private function __clone()
    {
    }

    /**
     * ������������ ���������
     */
    private function __sleep()
    {
    }

    /**
     * �������������� ���������
     */
    private function __wakeup()
    {
    }
}

/*
 * =====================================
 *           USING OF SINGLETON
 * =====================================
 */

$firstProduct = Product::getInstance();
$secondProduct = Product::getInstance();

$firstProduct->a = 1;
$secondProduct->a = 2;

print_r($firstProduct->a);
// 2
print_r($secondProduct->a);
// 2