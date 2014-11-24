<?php
/**
 * @author Crysthiano Aguiar <crysthianophp@gmail.com>
 * @version 0.1
 */

namespace UserApi\Service;

use Zend\Http\Response;

class ProcessJson
{
    private $data;
    private $response;
    private $serializer;

    public function __construct(Response $response = null, $data = null, $serializer = null)
    {
        $this->response   = $response;
        $this->data       = $data;
        $this->serializer = $serializer;
    }

    public function process()
    {
        $serializer = $this->serializer;
        $result = $serializer->serialize($this->data, 'json');

        $this->response->setContent($result);

        $headers = $this->response->getHeaders();
        $headers->addHeaderLine('Content-type', 'application/json');
        $this->response->setHeaders($headers);

        return $this->response;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setResponse($response)
    {
        $this->response = $response;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function setSerializer($serializer)
    {
        $this->serializer = $serializer;
    }

    public function getSerializer()
    {
        return $this->serializer;
    }
}
