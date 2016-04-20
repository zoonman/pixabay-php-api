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

namespace Pixabay;

use GuzzleHttp\Client;

/**
 * Class PixabayClient
 * @package Pixabay\PixabayClient
 */
class PixabayClient {

    /**
     * @var array
     */
    private $options =[];

    /**
     * @var array
     */
    private $optionsList = [
        'key',
        'response_group',
        'id',
        'q',
        'lang',
        'callback',
        'image_type',
        'orientation',
        'category',
        'min_width',
        'min_height',
        'editors_choice',
        'safesearch',
        'page',
        'per_page',
        'pretty',
        'order'
    ];

    /**
     * @var Client
     */
    private $client;

    /**
     * Root of Pixabay REST API
     */
    const API_ROOT = 'https://pixabay.com/api/';

    /**
     * Class constructor
     *
     * @param array $options
     * @throws \Exception
     */
    public function __construct(array $options)
    {
        $this->client = new Client(['base_url' => self::API_ROOT]);
        if (empty($options['key'])) {
            throw new \Exception('You must specify "key" parameter in constructor options');
        }
        $this->parseOptions($options);
    }

    /**
     * Parse Provided options
     *
     * @param array $options
     * @param bool $resetOptions
     */
    private function parseOptions(array $options, $resetOptions = false) 
    {
        foreach ($this->optionsList as $option) {
            if (isset($options[$option])) {
                $this->options[$option] = $options[$option];
            } elseif ($resetOptions && isset($this->options[$option])) {
                unset($this->options[$option]);
            }
        }
    }

    /**
     * Get Data from Pixabay API
     *
     * @param array $options
     * @param bool $returnObject
     * @param bool $resetOptions
     * @return mixed
     */
    public function get(array $options = [], $returnObject = false, $resetOptions = false) 
    {
        $this->parseOptions($options, $resetOptions);
        $response = $this->client->request('GET', self::API_ROOT, ['query' => $this->options]);
        $data = $response->getBody()->getContents();
        return json_decode($data, $returnObject);
    }
}
