<?php
/**
 * pixabay-php-api
 * index.php
 *
 * PHP Version 5
 *
 * @category Production
 * @package  Default
 * @author   Philipp Tkachev <zoonman@gmail.com>
 * @date     12/14/14 9:58 AM
 * @license  https://www.zoonman.com/projects/pixabay/license.txt MIT
 * @version  GIT: 1.0
 * @link     https://www.zoonman.com/projects/pixabay/
 */

// show all possible errors
error_reporting(E_ALL);

require_once '../vendor/autoload.php';
require_once '../src/Pixabay/PixabayClient.php';

// Obtain key on https://pixabay.com/api/docs/
$pixabayClient = new \Pixabay\PixabayClient(array(
    'key' => 'Your API key'
));

// test it
$results = $pixabayClient->get(['q' => 'nature'], true);

// show the results
echo json_encode($results);
