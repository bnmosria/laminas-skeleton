<?php

declare(strict_types=1);

namespace Task\Exception;

use Mezzio\ProblemDetails\Exception\ProblemDetailsExceptionInterface;
use Throwable;

/**
 * @author  Benjamin Osoria Peralta <bnmosria@hotmail.com>
 * @package Category\Exception
 */
interface TaskExceptionInterface extends Throwable, ProblemDetailsExceptionInterface
{
}
