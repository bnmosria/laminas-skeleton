<?php

declare(strict_types=1);

namespace Task\Exception;

use Laminas\Http\Response;
use Mezzio\ProblemDetails\Exception\CommonProblemDetailsExceptionTrait;
use RuntimeException;

/**
 * @author  Benjamin Osoria Peralta <bnmosria@hotmail.com>
 * @package Category\Exception
 */
class InvalidFormDataException extends RuntimeException implements TaskExceptionInterface
{
    use CommonProblemDetailsExceptionTrait;

    private const EXCEPTION_TITLE = 'Invalid form data';
    private const EXCEPTION_MESSAGE = 'The given form data inputs are invalids';
    private const STATUS = Response::STATUS_CODE_400;
    private const TYPE = 'https://example.com/problems/invalid-parameters';

    public static function fromMessages(array $messages): InvalidFormDataException
    {
        $exception = new self();

        $exception->status = self::STATUS;
        $exception->detail = self::EXCEPTION_MESSAGE;
        $exception->title = self::EXCEPTION_TITLE;
        $exception->type = self::TYPE;
        $exception->additional = $messages ?? [];

        return $exception;
    }
}
