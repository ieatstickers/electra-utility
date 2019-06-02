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
}