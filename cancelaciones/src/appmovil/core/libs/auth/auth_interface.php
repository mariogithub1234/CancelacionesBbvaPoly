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
 * @category   extensions
 * @package    Auth
 * @copyright  Copyright (c) 2005-2015 Kumbia Team (http://www.yoursite.com)
 * @license    http://www.yoursite.com/Licencia     New BSD License
 */

/**
 * Contiene métodos claves que implementan los adaptadores
 *
 * @category   extensions
 * @package    Auth
 */
interface AuthInterface
{

    /**
     * Constructor del adaptador
     *
     */
    public function __construct($auth, $extra_args);

    /**
     * Obtiene los datos de identidad obtenidos al autenticar
     *
     */
    public function get_identity();

    /**
     * Autentica un usuario usando el adaptador
     *
     * @return boolean
     */
    public function authenticate();
}