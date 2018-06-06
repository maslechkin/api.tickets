<?php

namespace Model;

class Itinerary
{
    /**
     * @param string $from
     * @param string $to
     * @param string|null $type
     * @return array
     */
    public function createItinerary($from, $to, $type = null)
    {
        $tickets = (new Tickets())->getTickets($type);
        $routes = $this->getRoute($from, $to, $tickets, null);
        $result = [];
        foreach ($routes as $id => $route) {
            foreach ($route->getTickets() as $ticket) {
                $result[$id][] = $ticket->getData();
            }
        }
        return $result;
    }

    /**
     * @param $from
     * @param $to
     * @param Ticket[] $tickets
     * @param Route|null $mainRoute
     *
     * @return Route[]
     */
    private function getRoute($from, $to, $tickets, Route $mainRoute = null)
    {
        /** @var Route[] $routes */
        $routes = [];
        foreach ($tickets as $ticket) {
            //skip ticket if this ticket in route
            if ($mainRoute != null && !empty($mainRoute->getById($ticket->getTicketNumber()))) {
                continue;
            }
            //skip tickets in once city
            if ($ticket->getFrom() == $ticket->getTo()) {
                continue;
            }
            if ($ticket->getFrom() == $from) {
                $route = new Route();
                if ($mainRoute != null) {
                    foreach ($mainRoute->getTickets() as $value) {
                        $route->add($value);
                    }
                }
                $route->add($ticket);
                if ($ticket->getTo() == $to) {
                    $routes[] = $route;
                } else {
                    $list = $this->getRoute($ticket->getTo(), $to, $tickets, $route);
                    for ($i = 0; $i < count($list); $i++) {
                        array_push($routes, $list[$i]);
                    }

                }
            }
        }
        return $routes;
    }
}