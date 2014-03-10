<?php
/**
 * ��������� �������� ���� ��������
 */
abstract class RegistryFactory extends FactoryAbstract
{

    /**
     * ���������� ��������� ������, �� �������� ������
     *
     * @param integer|string $id - ���������� ������������� ��������
     * @return static
     */
    final public static function getInstance($id)
    {
        $className = static::getClassName();
        if (isset(self::$instances[$className])) {
            if (!isset(self::$instances[$className][$id])) {
                self::$instances[$className][$id] = new $className($id);
            }
        } else {
            self::$instances[$className] = [
                $id => new $className($id),
            ];
        }
        return self::$instances[$className][$id];
    }

    /**
     * ������� ��������� ������, �� �������� ������
     *
     * @param integer|string $id - ���������� ������������� ��������. ���� �� ������, ��� ���������� ������ ����� �������
     * @return void
     */
    final public static function removeInstance($id = null)
    {
        $className = static::getClassName();
        if (isset(self::$instances[$className])) {
            if (is_null($id)) {
                unset(self::$instances[$className]);
            } else {
                if (isset(self::$instances[$className][$id])) {
                    unset(self::$instances[$className][$id]);
                }
                if (empty(self::$instances[$className])) {
                    unset(self::$instances[$className]);
                }
            }
        }
    }

    protected function __construct($id)
    {
    }
}

/*
 * =====================================
 *           USING OF MULTITON
 * =====================================
 */

/**
 * ������ ��� ��������
 */
class FirstFactory extends RegistryFactory
{
    public $a = [];
}

/**
 * ������ ��� ��������
 */
class SecondFactory extends FirstFactory
{
}

// ��������� �������� ��������
FirstFactory::getInstance('FirstProduct')->a[] = 1;
FirstFactory::getInstance('SecondProduct')->a[] = 2;
SecondFactory::getInstance('FirstProduct')->a[] = 3;
SecondFactory::getInstance('SecondProduct')->a[] = 4;
FirstFactory::getInstance('FirstProduct')->a[] = 5;
FirstFactory::getInstance('SecondProduct')->a[] = 6;
SecondFactory::getInstance('FirstProduct')->a[] = 7;
SecondFactory::getInstance('SecondProduct')->a[] = 8;

print_r(FirstFactory::getInstance('FirstProduct')->a);
// array(1, 5)
print_r(FirstFactory::getInstance('SecondProduct')->a);
// array(2, 6)
print_r(SecondFactory::getInstance('FirstProduct')->a);
// array(3, 7)
print_r(SecondFactory::getInstance('SecondProduct')->a);
// array(4, 8)