<?php

namespace Classes;

include ('Request.php');


class Router {

    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_DELETE = 'DELETE';

    /**
     * @return string
     */
    public function getData()
    {
        $request = new Request();
        $path = $this->getPath($request);
        return !empty($path[1]) ?
        $this->getResponse($path[2], $request->getMethod(), $path[1], $this->getParams($request)) : null;
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    private function getPath(Request $request)
    {
        $url = explode('?', $request->getUri());
        $path = explode('/', $url[0]);
        return $path;
    }

    /**
     * @param string $controller
     * @param string $method
     * @param string $version
     * @param array $params
     *
     * @return mixed
     */
    private function getResponse($controller, $method, $version, $params)
    {
        $controllerName = ucfirst($controller).'Controller';
        $methodName = strtolower($method);
        if($this->checkClass($controllerName)) {
            /** var BaseController $controller */
            $controller = new $controllerName($version, $params);
            var_dump($controller->$methodName()); die();
            echo json_encode($controller->$methodName());
        }
    }

    private function checkClass($className)
    {
        include(SITE_PATH . '/Controller/' . $className . '.php');
        return class_exists($className);
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    private function getParams(Request $request)
    {
        switch ($request->getMethod()){
            case self::METHOD_GET:
                return $request->getParams();
                break;
            case self::METHOD_POST:
                return $request->postParams();
                break;
            case self::METHOD_PUT:
                return $request->putParams();
                break;
            case self::METHOD_DELETE:
                return $request->deleteParams();
                break;
        }
    }
}