<?php

class RouteController implements \Controller\BaseController
{
    /** @var string */
    private $version;

    /** @var array */
    private $params;

    /**
     * TicketsController constructor.
     * @param $v
     * @param array $params
     */
    public function __construct($v, $params)
    {
        $this->version = $v;
        $this->params = $params;
    }

    public function get()
    {
        $data = $this->params;
        return json_encode((new \Model\Itinerary())->createItinerary(
            $data[\Model\Ticket::FROM],
            $data[\Model\Ticket::TO],
            !empty($data[\Model\Ticket::TYPE]) ? $data[\Model\Ticket::TYPE] : []
        ));
    }

    public function post()
    {
    }

    public function put()
    {
    }

    public function delete()
    {
    }
}