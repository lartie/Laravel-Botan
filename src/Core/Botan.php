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

namespace LArtie\LaravelBotan\Core;

use GuzzleHttp\Client;
use LArtie\LaravelBotan\Exceptions\BotanException;
use RuntimeException;

/**
 * Class Botan
 * @package LArtie\Botan\Core
 */
final class Botan {
    /**
     * @var string Tracker url
     */
    private $templateUri = 'https://api.botan.io/track?token=#TOKEN&uid=#UID&name=#NAME';

    /**
     * @var string Url shortener url
     */
    private $shortenerUri = 'https://api.botan.io/s/?token=#TOKEN&user_ids=#UID&url=#URL';

    /**
     * @var string Yandex AppMetrica application api_key
     */
    private $token;

    /**
     * Botan constructor.
     * @param $token
     * @throws BotanException
     */
    public function __construct(string $token = '')
    {
        if (empty($token)) {

            $token = env('BOTAN_TOKEN', null);

            if ($token === null) {
                throw new BotanException('Token should be a string', 2);
            }
        }
        $this->token = $token;
    }

    /**
     * @param array $message
     * @param string $eventName
     * @throws BotanException
     * @throws RuntimeException
     */
    public function track(array $message, string $eventName = 'Message')
    {
        $uid = $message['from']['id'];
        $url = str_replace(
            ['#TOKEN', '#UID', '#NAME'],
            [$this->token, $uid, urlencode($eventName)],
            $this->templateUri
        );
        
        $client = new Client();

        $result = $client->get($url, [], $message);
        $data = \GuzzleHttp\json_decode($result->getBody()->getContents(), true);

        if ($data['status'] !== 'accepted') {
            throw new BotanException('Error Processing Request', 1);
        }
    }

    /**
     * @param string $url
     * @param int $userId
     * @return string
     */
    public function shortenUrl(string $url, int $userId) : string
    {
        $requestUrl = str_replace(
            ['#TOKEN', '#UID', '#URL'],
            [$this->token, $userId, urlencode($url)],
            $this->shortenerUri
        );

        $response = file_get_contents($requestUrl);
        return $response === false ? $url : $response;
    }
}