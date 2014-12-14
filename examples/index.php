<?php
/**
 * pixabay-php-api
 * index.php
 *
 * PHP Version 5
 *
 * @category Production
 * @package  Default
 * @author   Philipp Tkachev <philipp@marketmesuite.com>
 * @date     12/14/14 9:58 AM
 * @license  https://www.zoonman.com/projects/pixabay/license.txt MIT
 * @version  GIT: 1.0
 * @link     https://www.zoonman.com/projects/pixabay/
 */


error_reporting(E_ALL);

require_once '../vendor/autoload.php';
require_once '../src/Zoonman/Pixabay/PixabayClient.php';


$pixabayClient = new \Zoonman\Pixabay\PixabayClient(array(
    'username' => 'userName',
    'key' => 'key'
));

// test it
$results = $pixabayClient->get(['q' => 'nature'], true);


// show the results
var_dump($results);