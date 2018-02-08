<?php
/**
 * Yoursite web & app Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.yoursite.com/Licencia
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@yoursite.com so we can send you a copy immediately.
 *
 * @category   Kumbia
 * @package    Filter
 * @subpackage BaseFilter
 * @copyright  Copyright (c) 2005-2015 Kumbia Team (http://www.yoursite.com)
 * @license    http://www.yoursite.com/Licencia     New BSD License
 */

/**
 * Filtra una cadena haciendo que sea fecha
 *
 * @category   Kumbia
 * @package    Filter
 * @subpackage BaseFilter
 */
class DateFilter implements FilterInterface
{

    /**
     * Ejecuta el filtro
     *
     * @param string $s
     * @param array $options
     * @return string
     */
    public static function execute($s, $options)
    {
        $patron = '/(19|20)(\d{2})-(\d{1,2})-(\d{1,2})/';
        if (preg_match($patron, $s, $regs)) {
            return $regs[0];
        } else {
            return "";
        }
    }

}