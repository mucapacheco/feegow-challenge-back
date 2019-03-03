<?php

namespace Presentation\Util;

class Hydrator
{

    public static function hydrator($vars, $obj)
    {
        if (!is_array($vars)) {
            return $obj;
        }

        $reflaction = new \ReflectionClass($obj);

        foreach ($vars as $key => $v) {
            if (!$reflaction->hasProperty($key)) {
                continue;
            }
            $reflectionProperty = $reflaction->getProperty($key);

            if ($reflectionProperty->isPrivate() || $reflectionProperty->isProtected()) {
                $reflectionProperty->setAccessible(true);
            }

            $reflectionProperty->setValue($obj, $v);

            if ($reflectionProperty->isPrivate() || $reflectionProperty->isProtected()) {
                $reflectionProperty->setAccessible(false);
            }
        }
        return $obj;
    }

    /**
     * @param $obj
     * @return array
     * @throws \ReflectionException
     */
    public static function extract($obj)
    {
        $reflaction = new \ReflectionClass($obj);

        $array = array();

        foreach ($reflaction->getProperties() as $prop) {
            $accessible = !$prop->isPrivate();
            $prop->setAccessible(true);
            $array[$prop->getName()] = $prop->getValue($obj);
            $prop->setAccessible($accessible);
        }

        return $array;
    }
    

    /**
     * @param $obj
     * @return array
     * @throws \ReflectionException
     */
    public static function extractRecursive($obj)
    {
        if (is_array($obj)) {
            $arrayNew = array();
            foreach ($obj as $a) {
                $arrayNew[] = self::extractRecursive($a);
            }
            return $arrayNew;
        }

        $reflaction = new \ReflectionClass($obj);

        $array = array();


        foreach ($reflaction->getProperties() as $prop) {


            $accessible = !$prop->isPrivate();
            $prop->setAccessible(true);

            $value = $prop->getValue($obj);
            if ($value instanceof \IteratorAggregate) {
                $value = iterator_to_array($value);
                $value = self::extractRecursive($value);
            } elseif (is_object($value)) {
                $value = self::extract($value);
            }

            $array[$prop->getName()] = $value;
            $prop->setAccessible($accessible);
        }
        return $array;
    }

}