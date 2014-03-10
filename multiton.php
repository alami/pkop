<?php
/**
 * Îáùèé èíòåğôåéñ ïóëà îäèíî÷åê
 */
abstract class FactoryAbstract
{

    /**
     * @var array
     */
    protected static $instances = array();


    /**
     * Âîçâğàùàåò ıêçåìïëÿğ êëàññà, èç êîòîğîãî âûçâàí
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
     * Óäàëÿåò ıêçåìïëÿğ êëàññà, èç êîòîğîãî âûçâàí
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
     * Âîçâğàùàåò èìÿ ıêçåìïëÿğà êëàññà
     *
     * @return string
     */
    final protected static function getClassName()
    {
        return get_called_class();
    }

    /**
     * Êîíñòğóêòîğ çàêğûò
     */
    protected function __construct()
    {
    }

    /**
     * Êëîíèğîâàíèå çàïğåùåíî
     */
    final protected function __clone()
    {
    }

    /**
     * Ñåğèàëèçàöèÿ çàïğåùåíà
     */
    final protected function __sleep()
    {
    }

    /**
     * Äåñåğèàëèçàöèÿ çàïğåùåíà
     */
    final protected function __wakeup()
    {
    }
}

/**
 * Èíòåğôåéñ ïóëà îäèíî÷åê
 */
abstract class Factory extends FactoryAbstract
{

    /**
     * Âîçâğàùàåò ıêçåìïëÿğ êëàññà, èç êîòîğîãî âûçâàí
     *
     * @return static
     */
    final public static function getInstance()
    {
        return parent::getInstance();
    }

    /**
     * Óäàëÿåò ıêçåìïëÿğ êëàññà, èç êîòîğîãî âûçâàí
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
 * Ïåğâûé îäèíî÷êà
 */
class FirstProduct extends Factory
{
    public $a = [];
}

/**
 * Âòîğîé îäèíî÷êà
 */
class SecondProduct extends FirstProduct
{
}

// Çàïîëíÿåì ñâîéñòâà îäèíî÷åê
FirstProduct::getInstance()->a[] = 1;
SecondProduct::getInstance()->a[] = 2;
FirstProduct::getInstance()->a[] = 3;
SecondProduct::getInstance()->a[] = 4;

print_r(FirstProduct::getInstance()->a);
// array(1, 3)
print_r(SecondProduct::getInstance()->a);
// array(2, 4)