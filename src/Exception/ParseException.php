<?php

/**
 * This file is part of the m1\env library
 *
 * (c) m1 <hello@milescroxford.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package     m1/env
 * @version     0.1.0
 * @author      Miles Croxford <hello@milescroxford.com>
 * @copyright   Copyright (c) Miles Croxford <hello@milescroxford.com>
 * @license     http://github.com/m1/env/blob/master/LICENSE.md
 * @link        http://github.com/m1/env/blob/master/README.md Documentation
 */

namespace M1\Env\Exception;

/**
 * Env ParseException
 *
 * @since 0.1.0
 */
class ParseException extends \ErrorException
{
    /**
     * Constructs a ParseException
     *
     * @param string $message          The value to parse
     * @param bool   $origin_exception To throw the exception in the .env
     * @param string $file             The .env file
     * @param string $line             The line of the value
     * @param int    $line_num         The line num of the value
     *
     * @return \M1\Env\Exception\ParseException The exception
     */
    public function __construct($message, $origin_exception = false, $file = null, $line = null, $line_num = null)
    {
        $message = $message;

        if (!is_null($file)) {
            $message .= sprintf(" in %s", $file);
        }

        if (!is_null($line)) {
            $message .= sprintf(" near %s", $line);
        }

        if (!is_null($line_num)) {
            $message .= sprintf(" at line %d", $line_num);
        }

        if ($origin_exception) {
            parent::__construct($message, 0, 1, $file, $line_num);
        }

        parent::__construct($message);
    }
}
