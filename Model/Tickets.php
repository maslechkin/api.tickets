<?php

namespace Model;

class Tickets
{

    /** @var Ticket[] */
    private $tickets = [];

    /**
     * @param string $from
     * @param string $to
     * @param string $ticket_number
     * @param array $params
     */
    public function setTicket($from, $to, $ticket_number, $params = [])
    {
        array_push($this->tickets,
            (new Ticket())->setFrom($from)->setTo($to)->setTicketNumber($ticket_number)->setParams($params)
        );
    }

    /**
     * @param string $type
     *
     * @return Ticket[]
     */
    public function getTickets($type = 'default')
    {
        return $type == Ticket::TYPE_RAND ? $this->getRand() : $this->getDefault();
    }

    private function getRand()
    {
        $this->setTickets(getDefaultTickets(rand(3, 10)));
        return $this->tickets;
    }

    private function getDefault()
    {
        $tickets = [
            md5(rand(1, 10000)) => [
                Ticket::FROM => 'saratov',
                Ticket::TO => 'odessa',
                Ticket::PARAMS => [],
            ],
            md5(rand(1, 10000)) => [
                Ticket::FROM => 'kyiv',
                Ticket::TO => 'rome',
                Ticket::PARAMS => [],
            ],
            md5(rand(1, 10000)) => [
                Ticket::FROM => 'rome',
                Ticket::TO => 'moscow',
                Ticket::PARAMS => [],
            ],
            md5(rand(1, 10000)) => [
                Ticket::FROM => 'rome',
                Ticket::TO => 'vienna',
                Ticket::PARAMS => [],
            ]
            ,
            md5(rand(1, 10000)) => [
                Ticket::FROM => 'rome',
                Ticket::TO => 'bratislava',
                Ticket::PARAMS => [],
            ],
            md5(rand(1, 10000)) => [
                Ticket::FROM => 'bratislava',
                Ticket::TO => 'lviv',
                Ticket::PARAMS => [],
            ]
        ];
        $this->setTickets($tickets);
        return $this->tickets;
    }

    /**
     * @param array $tickets
     */
    private function setTickets($tickets = [])
    {
        foreach ($tickets as $id => $ticket) {
            $this->setTicket(
                $ticket[Ticket::FROM],
                $ticket[Ticket::TO],
                $id,
                $ticket[Ticket::PARAMS]
            );
        }
    }
}