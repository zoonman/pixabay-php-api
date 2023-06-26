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
    private $options = [];

    /**
     * Please consult for parameters on the documentation page https://pixabay.com/api/docs/
     *
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
        'colors',
        'editors_choice',
        'safesearch',
        'page',
        'per_page',
        'pretty',
        'response_group',
        'order',
        'video_type'
    ];

    /**
     * @var Client
     */
    private $client;

    /**
     * Root of Pixabay REST API
     */
    const API_ROOT = 'https://pixabay.com/api/';
    const SEGMENT_IMAGES = '';
    const SEGMENT_VIDEOS = 'videos/';

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
    private function parseOptions(array $options, bool $resetOptions = false)
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
     * @param bool $returnAssociativeArray
     * @param bool $resetOptions
     * @param string $segment
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(array $options = [], bool $returnAssociativeArray = false, bool $resetOptions = false, string $segment = self::SEGMENT_IMAGES)
    {
        $this->parseOptions($options, $resetOptions);
        $response = $this->client->request('GET', self::API_ROOT . $segment, ['query' => $this->options]);
        $data = $response->getBody()->getContents();
        return json_decode($data, $returnAssociativeArray);
    }

    /**
     * Get Images from Pixabay API
     *
     * @param array $options
     * @param bool $returnAssociativeArray
     * @param bool $resetOptions
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getImages(array $options = [], bool $returnAssociativeArray = false, bool $resetOptions = false)
    {
        return $this->get($options, $returnAssociativeArray, $resetOptions, self::SEGMENT_IMAGES);
    }

    /**
     * Get Videos from Pixabay API
     *
     * @param array $options
     * @param bool $returnAssociativeArray
     * @param bool $resetOptions
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getVideos(array $options = [], bool $returnAssociativeArray = false, bool $resetOptions = false)
    {
        return $this->get($options, $returnAssociativeArray, $resetOptions, self::SEGMENT_VIDEOS);
    }
}
