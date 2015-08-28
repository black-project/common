<?php

namespace Black\Component\Common\Infrastructure\Doctrine;

/**
 * Interface Manager
 *
 * @author  Alexandre 'pocky' Balmes <alexandre@lablackroom.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
interface Manager
{
    /**
     * Return the object manager
     *
     * @return mixed
     */
    public function getManager();

    /**
     * Flush the curent manager
     *
     * @return mixed
     */
    public function flush();
}
