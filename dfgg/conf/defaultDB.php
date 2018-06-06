<?php

function getDefaultCities()
{
    return [
        'madrid',
        'barcelona',
        'kyiv',
        'lviv',
        'new-york',
        'london',
        'rome'
    ];
}

function getDefaultTransport()
{
    return [
        'bus',
        'train',
        'plane',
        'taxi',
        'boat'
    ];
}


function getDefaultValue($value)
{
    return $value[rand(0, count($value) - 1)];
}

function getDefaultTickets($count)
{
    $tickets = [];
    for ($i = 0; $i < $count; $i++) {
        $tickets[md5(rand(1, 10000))] = [
            \Model\Ticket::FROM => getDefaultValue(getDefaultCities()),
            \Model\Ticket::TO => getDefaultValue(getDefaultCities()),
            \Model\Ticket::PARAMS => [
                \Model\Ticket::PLACE => rand(1, 100),
                \Model\Ticket::TRANSPORT => getDefaultValue(getDefaultTransport()),
            ],
        ];
    }
    return $tickets;
}