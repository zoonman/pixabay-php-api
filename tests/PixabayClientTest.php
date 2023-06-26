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
    * @expectedException \Exception
    * @expectedExceptionMessage You must specify "key" parameter in constructor options
    */
    public function testConstructorOnNoKeyParameter()
    {
        $this->object = new PixabayClient([]);
    }

  /**
   * Run tests
   * @expectedException GuzzleHttp\Exception\ClientException
   */
    public function testGetImages()
    {
        $this->assertInternalType('array', $this->object->getImages(['q' => 'test']));
    }

  /**
   * Run tests
   * @expectedException GuzzleHttp\Exception\ClientException 
   */
    public function testGetVideos()
    {
        $this->assertInternalType('array', $this->object->getVideos(['q' => 'test']));
    }
}
