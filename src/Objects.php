<?php

namespace Electra\Utility;

class Objects
{
  /**
   * @param object $destination
   * @param object $source
   * @param array|null $properties
   * @return mixed|null
   * @throws \Exception
   *
   * Hydrates all public properties on the destination object with values from
   * the source (if they exist on the source).
   */
  public static function hydrate(object $destination, object $source,  array $properties = null): object
  {
    if(!is_object($destination) || !is_object($source))
    {
      throw new \Exception("Cannot hydrate object. Source and destination must both be of type 'object'.");
    }

    // Get properties to copy
    $destPublicProperties = self::getPublicProperties($destination);

    foreach ($destPublicProperties as $property)
    {
      if (
        isset($source->{$property})
        && (!$properties || in_array($property, $properties))
      )
      {
        $destination->{$property} = $source->{$property};
      }
    }

    return $destination;
  }

  /**
   * @param string $property
   * @param object $object
   * @param null $default
   * @return mixed | null
   */
  public static function getProperty(string $property, object $object, $default = null)
  {
    return isset($object->{$property}) ? $object->{$property} : $default;
  }

  /**
   * @param object $object
   * @return array
   */
  public static function getPublicProperties(object $object): array
  {
    return array_keys(get_object_vars($object));
  }

  /**
   * @param object $object
   * @return string
   */
  public static function getClassName(object $object): string
  {
    return array_pop(explode('\\', get_class($object)));
  }

  /**
   * @param object $object
   * @param array $propertyTypeMap
   * @param bool $allowNullValues
   * @param bool $throwExceptions
   * @return bool
   * @throws \Exception
   */
  public static function validatePropertyTypes(
    object $object,
    array $propertyTypeMap,
    bool $allowNullValues = false,
    bool $throwExceptions = false
  )
  {
    // For each item in the property type map as $propertyName => $type
    foreach ($propertyTypeMap as $propertyName => $expectedType)
    {
      // Get the type of the property
      $propertyExists = property_exists($object, $propertyName);

      // If the property doesn't exist
      if (!$propertyExists)
      {
        if ($throwExceptions)
        {
          throw new \Exception("Object validation failed: property '$propertyName' does not exist");
        }
        else
        {
          return false;
        }
      }

      // Get the property type
      $propertyType = gettype($object->{$propertyName});

      // If property is null
      if ($propertyType == 'NULL')
      {
        if ($allowNullValues)
        {
          continue;
        }
        else
        {
          if ($throwExceptions)
          {
            throw new \Exception("Object validation failed: property value null, '$expectedType' expected.");
          }
          else
          {
            return false;
          }
        }
      }

      // If property is an object
      if ($propertyType == 'object')
      {
        // If expected type is 'object'
        if ($expectedType == 'object')
        {
          continue;
        }

        $fqns = get_class($object->{$propertyName});

        if ($expectedType == $fqns)
        {
          continue;
        }

        if ($throwExceptions)
        {
          throw new \Exception("Object validation failed: property value of type $propertyType, instance of $expectedType expected.");
        }
        else
        {
          return false;
        }
      }

      // Check type directly
      if ($propertyType !== $expectedType)
      {
        if ($throwExceptions)
        {
          throw new \Exception("Object validation failed: property value of type $propertyType, $expectedType expected.");
        }
        else
        {
          return false;
        }
      }
    }

    return true;
  }

  /**
   * @param object $object
   * @param array $requiredProperties
   * @param bool $throwExceptions
   * @return bool
   * @throws \Exception
   */
  public static function validatePropertiesExist(
    object $object,
    array $requiredProperties,
    bool $throwExceptions = false
  )
  {
    // For each item in the property type map as $propertyName => $type
    foreach ($requiredProperties as $propertyName)
    {
      // Get the type of the property
      $propertyExists = property_exists($object, $propertyName);

      // If the property doesn't exist
      if (!$propertyExists)
      {
        if ($throwExceptions)
        {
          throw new \Exception("Object validation failed: property '$propertyName' does not exist");
        }
        else
        {
          return false;
        }
      }
    }

    return true;
  }

  /**
   * @param object $source
   * @param object $destination
   * @return object
   */
  public static function copyAllProperties(object $source, object $destination): object
  {
    $sourcePublicProperties = self::getPublicProperties($source);

    foreach ($sourcePublicProperties  as $publicProperty)
    {
      $destination->{$publicProperty} = $source->{$publicProperty};
    }

    return $destination;
  }

}