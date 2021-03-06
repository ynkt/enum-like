<?php

declare(strict_types=1);

/**
 * @license MIT
 * @copyright 2020 Nakata Yudai
 * @link https://github.com/ynkt/enum
 * @author ynkt
 */

namespace Ynkt\Enum;

/**
 * Trait ByIdTrait
 *
 * @package Ynkt\Enum
 */
trait ByIdTrait
{
    /**
     * @return string|int
     */
    abstract protected function id();

    /**
     * @param string|int $id
     *
     * @return static
     */
    public static function byId($id)
    {
        $expression = fn(self $instance) => $id == $instance->id();

        if (! self::has($expression)) {
            throw (new EnumeratorNotFoundException())->setQueryParameter(static::class, compact('id'));
        }

        return self::first($expression);
    }
}
