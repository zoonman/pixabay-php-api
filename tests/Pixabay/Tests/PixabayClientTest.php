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
class PixabayClientTest extends TestCase {

  /**
   * @var \Pixabay\PixabayClient
   */
    protected $object;

    /**
     * Setup tests
     * @throws \Exception
     */
    public function setUp(): void
    {
        $this->object = new PixabayClient(['key' => 'test']);
    }

  /**
    * Run tests
    *
   *
   */
    public function testConstructorOnNoKeyParameter()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("You must specify \"key\" parameter in constructor options");
        $this->object = new PixabayClient([]);
    }

  /**
   * Run tests
   *
   */
    public function testGetImages()
    {
        $this->expectException(ClientException::class);
        $this->assertIsArray($this->object->getImages(['q' => 'test']));
    }

  /**
   * Run tests
   *
   */
    public function testGetVideos()
    {
        $this->expectException(ClientException::class);
        $this->assertIsArray($this->object->getVideos(['q' => 'test']));
    }
}
