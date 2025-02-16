<?php 

/**
 * 
 */
class BankApi 
{
    /** @var apiUrl */
    private string $apiUrl;

    /** @var apiKey*/
    private string $apiKey;

    /**
     * @param string $apiUrl
     * @param string $apiKey
     * 
     */
    public function __construct(string $apiUrl, string $apiKey)
    {
        $this->apiUrl = $apiUrl;
        $this->apiKey = $apiKey;
    }

    /**
     * Make a request to the bank API
     * 
     * @param string $endpoint
     * @param array $data
     * @param string $method (GET, POST, PUT, DELETE)
     * @return array|null
     */
    public function api(string $endpoint, array $data = [], string $method = 'GET'): ?array
    {

    }

    /**
     * 
     */
    public function bank(): ?array
    {

    }
}