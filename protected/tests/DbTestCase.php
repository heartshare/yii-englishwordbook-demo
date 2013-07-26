<?php

/**
 * DbTestCase class file.
 */
class DbTestCase extends CDbTestCase
{
    /**
     * @link http://sebastian-bergmann.de/archives/881-Testing-Your-Privates.html
     */
    public static function getMethod($className, $methodName)
    {
        $class = new ReflectionClass($className);
        $method = $class->getMethod($methodName);
        $method->setAccessible(true);

        return $method;
    }
}

