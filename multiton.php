<?php
/**
 * ����� ��������� ���� ��������
 */
abstract class FactoryAbstract
{

    /**
     * @var array
     */
    protected static $instances = array();


    /**
     * ���������� ��������� ������, �� �������� ������
     *
     * @return static
     */
    public static function getInstance()
    {
        $className = static::getClassName();
        if (!isset(self::$instances[$className])) {
            self::$instances[$className] = new $className();
        }
        return self::$instances[$className];
    }

    /**
     * ������� ��������� ������, �� �������� ������
     *
     * @return void
     */
    public static function removeInstance()
    {
        $className = static::getClassName();
        if (isset(self::$instances[$className])) {
            unset(self::$instances[$className]);
        }
    }

    /**
     * ���������� ��� ���������� ������
     *
     * @return string
     */
    final protected static function getClassName()
    {
        return get_called_class();
    }

    /**
     * ����������� ������
     */
    protected function __construct()
    {
    }

    /**
     * ������������ ���������
     */
    final protected function __clone()
    {
    }

    /**
     * ������������ ���������
     */
    final protected function __sleep()
    {
    }

    /**
     * �������������� ���������
     */
    final protected function __wakeup()
    {
    }
}

/**
 * ��������� ���� ��������
 */
abstract class Factory extends FactoryAbstract
{

    /**
     * ���������� ��������� ������, �� �������� ������
     *
     * @return static
     */
    final public static function getInstance()
    {
        return parent::getInstance();
    }

    /**
     * ������� ��������� ������, �� �������� ������
     *
     * @return void
     */
    final public static function removeInstance()
    {
        parent::removeInstance();
    }
}

/*
 * =====================================
 *           USING OF MULTITON
 * =====================================
 */

/**
 * ������ ��������
 */
class FirstProduct extends Factory
{
    public $a = [];
}

/**
 * ������ ��������
 */
class SecondProduct extends FirstProduct
{
}

// ��������� �������� ��������
FirstProduct::getInstance()->a[] = 1;
SecondProduct::getInstance()->a[] = 2;
FirstProduct::getInstance()->a[] = 3;
SecondProduct::getInstance()->a[] = 4;

print_r(FirstProduct::getInstance()->a);
// array(1, 3)
print_r(SecondProduct::getInstance()->a);
// array(2, 4)