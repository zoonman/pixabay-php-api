<?php
/**
 * pixabay-php-api
 * PixabayClient API
 *
 * PHP Version 5
 *
 * @category Production
 * @package  Default
 * @author   Philipp Tkachev <zoonman@gmail.com>
 * @date     12/14/14 9:18 AM
 * @license  https://www.zoonman.com/projects/pixabay/license.txt MIT
 * @version  GIT: 1.0
 * @link     https://www.zoonman.com/projects/pixabay/
 */

namespace Pixabay\Tests;

use GuzzleHttp\Exception\ClientException;
use Pixabay\PixabayClient;
use PHPUnit\Framework\TestCase;

/**
 * Class PixabayClientTest
 *
 * @package Pixabay
 */
class PixabayClientTest extends TestCase
{


    /**
     * Run constructor tests
     *
     */
    public function testConstructorOnNoKeyParameter()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("You must specify \"key\" parameter in constructor options");
        new PixabayClient([]);
    }

    /**
     * Assert that API will throw when invalid key supplied
     *
     */
    public function testFakeKey()
    {
        $this->expectException(ClientException::class);
        $object = new PixabayClient(['key' => 'FAKE_KEY']);
        $object->getImages(['q' => 'test', 'per_page' => 3], true);
    }

    /**
     * Run getImages tests
     *
     */
    public function testGetImages()
    {
        $object = new PixabayClient(['key' => getenv('PIXABAY_API_KEY')]);
        $results = $object->getImages(['q' => 'test', 'per_page' => 3], true);
        $this->assertIsArray($results);
        var_dump($results);
    }

    /**
     * Run tests
     *
     */
    public function testGetVideos()
    {
        $object = new PixabayClient(['key' => getenv('PIXABAY_API_KEY')]);
        $this->assertIsObject($object->getVideos(['q' => 'test', 'per_page' => 3], false));
    }
}
