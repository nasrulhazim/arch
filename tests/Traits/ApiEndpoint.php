<?php

namespace Tests\Traits;

trait ApiEndpoint
{
    /**
     * Call API Endpoint.
     *
     * @param string $uri
     * @param string $method
     * @param array  $data
     *
     * @return string|object
     */
    public function apiEndpoint($uri, $method = 'GET', $data = [])
    {
        return $this->json($method, $uri, $data, $this->getApiHeaders());
    }

    /**
     * Get API Headers.
     *
     * @return array
     */
    public function getApiHeaders()
    {
        return [];
    }

    /**
     * Assert API Response.
     *
     * @param string $uri
     * @param string $expected
     * @param string $method
     * @param array  $data
     *
     * @return string
     */
    public function assertApiResponse($uri, $expected, $method = 'GET', $data = [])
    {
        return $this
            ->apiEndpoint($uri, $method, $data)
            ->assertJson($expected);
    }
}
