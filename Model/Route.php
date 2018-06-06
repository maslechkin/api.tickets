<?php

namespace Model;

class Route
{

    /** @var Ticket[] */
    private $tickets = [];

    /**
     * @param Ticket $ticket
     */
    public function add(Ticket $ticket)
    {
        if(empty($this->getById($ticket->getTicketNumber()))) {
            array_push($this->tickets, $ticket);
        }
    }

    public function getTickets()
    {
        return $this->tickets;
    }

    /**
     * @param $id
     *
     * @return bool|Ticket
     */
    public function getById($id)
    {
        foreach ($this->tickets as $ticket) {
            if ($ticket->getTicketNumber() == $id) {
                return $ticket;
            }
        }
        return false;
    }
}