<?php
/**
 * Laravel Botan
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the MIT License.
 *
 * This source file is subject to the MIT  License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://opensource.org/licenses/MIT
 *
 * @package LaravelBotan
 * @author Artemy B. <artemy.be@gmail.com>
 * @license MIT
 * @copyright (c) 2016 LArtie
 * @link https://artie.su
 *
 * 22.11.2016
 */

namespace LArtie\LaravelBotan\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Botan
 * @package LArtie\LaravelBotan\Facades
 *
 * @method static void track(array $message, string $eventName = 'Message')
 * @method static string shortenUrl(string $url, int $userId)
 */
final class Botan extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'botan';
    }
}