<?php

namespace Model;

class Ticket
{
    const FROM = 'from';
    const TO = 'to';
    const PARAMS = 'params';
    const PLACE = 'place';
    const TRANSPORT = 'transport';
    const TICKET_NUMBER = 'ticket_number';
    const TYPE = 'type';
    const TYPE_RAND = 'rand';
    const TYPE_DEFAULT = 'default';

    /** @var string */
    private $from;

    /** @var string */
    private $to;

    /** @var array */
    private $params;

    /** @var string */
    private $ticketNumber;

    /**
     * @param string $from
     * @return Ticket
     */
    public function setFrom($from)
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @param string $to
     * @return Ticket
     */
    public function setTo($to)
    {
        $this->to = $to;
        return $this;
    }

    /**
     * @param array $params
     * @return Ticket
     */
    public function setParams($params)
    {
        $this->params = $params;
        return $this;
    }

    /**
     * @param string $ticketNumber
     * @return Ticket
     */
    public function setTicketNumber($ticketNumber)
    {
        $this->ticketNumber = $ticketNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getFrom()
    {
        return strtolower($this->from);
    }

    /**
     * @return string
     */
    public function getTicketNumber()
    {
        return strtolower($this->ticketNumber);
    }

    /**
     * @return string
     */
    public function getTo()
    {
        return strtolower($this->to);
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return [
            self::TICKET_NUMBER => $this->getTicketNumber(),
            self::FROM => $this->getFrom(),
            self::TO => $this->getTo(),
        ];
    }
}