<?php
/**
 * A PSR-4 PHP class that simplifies timezone picking.
 *
 * @author      Pierre-Emmanuel Lévesque
 * @email       pierre.e.levesque@gmail.com
 * @copyright   Copyright 2014, Pierre-Emmanuel Lévesque
 * @license     MIT License - @see LICENSE.md
 */

/**
 * To Do
 *
 * - Add params for select in getMenu(), like id, class, etc...
 * - Add DST marking in default time format.
 */

namespace Pel\Helper;

class Timezone
{
    /**
     * Creates an array of all timezone identifiers as key,
     * and time + timezone identifier as value. Useful for creating
     * a timezone picker dropdown menu.
     *
     *  foreach (Timezone::getList() as $value => $option) {
     *      echo '<option value="' . $value . '">' . $option . '</option>';
     *  }
     *
     * @param   string    time format (def: 'h:i a \- \G\M\T P \- ')
     * @return  array     timezone identifier list
     */
    public static function getList($time_format = 'h:i a \- \G\M\T P \- ')
    {
        $zones_temp = array();

        // Creates zones_temp with identifier, offset, and time.
        foreach (\DateTimeZone::listIdentifiers() as $timezone_identifier) {
            $datetime = new \DateTime('now', new \DateTimeZone($timezone_identifier));

            $zones_temp[] = array(
                'identifier' => $timezone_identifier,
                'offset' => $datetime->getOffset(),
                'time' => $datetime->format($time_format)
            );
        }

        // Sort the zones_temps by offset, identifier ascending.
        usort($zones_temp, function($a, $b) {
            return ($a['offset'] == $b['offset'])
                ? strcmp($a['identifier'], $b['identifier'])
                : $a['offset'] - $b['offset'];
        });

        // Prepares zones for return.
        $zones = array();
        foreach ($zones_temp as $zone) {
            $zones[$zone['identifier']] = $zone['time'] . $zone['identifier'];
        }

        return $zones;
    }

     /**
     * Get a drop down menu timezone picker.
     *
     * @param   string    time format (def: 'h:i a \- \G\M\T P \- ')
     * @return  HTML      timezone picker drop down menu
     */
    public static function getMenu($time_format = 'h:i a \- \G\M\T P \- ')
    {
        $timezones = static::getList($time_format);

        $menu = '<select>' . "\n";

        foreach ($timezones as $value => $display_value) {
            $menu .= '<option value="' . $value . '">' . $display_value . '</option>' . "\n";
        }

        $menu .= '<\select>' . "\n";

        return $menu;
    }
}
