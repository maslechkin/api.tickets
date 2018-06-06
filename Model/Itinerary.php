<?php

namespace Model;

class Itinerary {

    /**
     * @param string $from
     * @param string $to
     * @param Ticket[] $tickets
     * @return array
     */
    public function createItinerary($from, $to, $tickets)
    {
        $archive = $tickets;
        $step = 0;
        $route = [];

        /**
         * First step
         */
        $start = $step;
        $finish = count($tickets);
        foreach ($tickets as $key => $ticket) {
            if ($ticket->getFrom() == strtolower($from) && $ticket->getTo() == strtolower($to)) {
                return $this->getPath($ticket);
            }
            if ($ticket->getFrom() == strtolower($from)) {
                $route[$start][$ticket->getTo()] = $ticket->getTicketNumber();
                unset($tickets[$key]);
            }
            if ($ticket->getTo() == strtolower($to)) {
                $route[$finish][$ticket->getFrom()] = $ticket->getTicketNumber();
                unset($tickets[$key]);
            }
        }

        /**
         * Second step
         */
        if (!empty($route[$start]) && !empty($route[$finish])) {
            while ($route[$start] > 0 && $route[$finish] > 0) {
                $secondStart = $start;
                $secondFinish = $finish;
                $secondStart = ++$secondStart;
                $secondFinish = --$secondFinish;
                foreach ($tickets as $key => $ticket) {
                    if (empty($route[$start][$ticket->getFrom()])) {
                        unset($route[$start][$ticket->getFrom()]);
                    } else {
                        if (!empty($route[$finish][$ticket->getTo()])) {
                            echo 'SUCCESS1';
                            var_dump($route);
                            echo 'SUCCESS1';
                            die();
                        } else {
                            $route[$secondStart][$ticket->getTo()] = $ticket->getTicketNumber();;
                        }
                    }
                    if (empty($route[$finish][$ticket->getTo()])) {
                        unset($route[$finish][$ticket->getTo()]);
                    } else {
                        $route[$secondFinish][$ticket->getFrom()] = $ticket->getTicketNumber();
                    }
                }
            }
        }


        var_dump($route);
        die();
    }

    private function getPath(Ticket $ticket)
    {
        return [
            Ticket::FROM => $ticket->getFrom(),
            Ticket::TO => $ticket->getTo(),
            Ticket::PARAMS => $ticket->getParams(),
        ];
    }
}