<?php
/**
 * 會員序號已經存在
 *
 * @another 小周
 */

namespace App\Repositories\Member\Exceptions;

use Exception;
use Throwable;

class SerialExist extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
