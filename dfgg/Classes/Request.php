<?php
namespace Classes;

class Request {

    /** @var string */
    private $uri;

    /** @var string */
    private $method;

    /** @var array */
    private $getParams;

    /** @var array */
    private $postParams;

    /** @var array */
    private $putParams;

    /** @var array */
    private $deleteParams;

    public function __construct()
    {
        $this->uri = !empty($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : null;
        $this->method = !empty($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : null;
        $this->getParams = !empty($_GET) ? $_GET : [];
        $this->postParams = !empty($_POST) ? $_POST : [];
        $this->putParams = !empty($_GET) ? $_GET : [];
        $this->deleteParams = !empty($_GET) ? $_GET : [];
    }

    /**
     * @return null|string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return null|string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->getParams;
    }

    /**
     * @return array
     */
    public function postParams()
    {
        return $this->postParams;
    }

    /**
     * @return array
     */
    public function putParams()
    {
        return $this->putParams;
    }

    /**
     * @return array
     */
    public function deleteParams()
    {
        return $this->deleteParams;
    }

}