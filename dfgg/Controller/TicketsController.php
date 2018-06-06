<?php

class TicketsController implements \Controller\BaseController {

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

    /**
     * @return string
     */
    public function get()
    {
        $data = [];
        $tickets = (new \Model\Tickets())->getTickets();
        foreach ($tickets as $ticket){
            $data[] = $ticket->getData();
        }
        return json_encode($data);
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