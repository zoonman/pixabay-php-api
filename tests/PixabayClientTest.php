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
 

namespace Zoonman\Pixabay;


class PixabayClientTest extends \PHPUnit_Framework_TestCase {

    protected $object;

    public function setup()
    {
        $this->object = new PixabayClient(['username' => 'test', 'key' => 'test']);
    }

    public function testGet()
    {
        $this->setExpectedException('GuzzleHttp\Exception\ClientException');
        $this->assertInternalType('array', $this->object->get(['q' => 'test']));
    }
}
