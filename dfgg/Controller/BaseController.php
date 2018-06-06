<?php

namespace Controller;

interface BaseController {

    /**
     * BaseController constructor.
     * @param string $v
     * @param array $params
     */
    public function  __construct($v, $params);

    /**
     * @return string
     */
    public function get();

    /**
     * @return string
     */
    public function post();

    /**
     * @return boolean
     */
    public function put();

    /**
     * @return boolean
     */
    public function delete();
}