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

namespace LArtie\LaravelBotan;

use Illuminate\Support\ServiceProvider;
use LArtie\LaravelBotan\Core\Botan;
use LArtie\LaravelBotan\Exceptions\BotanException;

/**
 * Class LaravelBotanServiceProvider
 * @package LArtie\LaravelBotan
 */
final class LaravelBotanServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     * @throws BotanException
     */
    public function register()
    {
        $this->app->bind('botan', Botan::class);
    }
}
