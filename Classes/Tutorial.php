<?php
namespace Classes;

class Tutorial {

    const ROW_METHOD = 'method';

    const ROW_REQUEST = 'request';

    const ROW_PARAMS = 'params';

    const ROW_DESCRIPTION = 'description';

    public function getData()
    {
        return [
            [
                self::ROW_METHOD => 'GET',
                self::ROW_REQUEST => '/',
                self::ROW_PARAMS => '',
                self::ROW_DESCRIPTION => 'Tutorial',
            ],
            [
                self::ROW_METHOD => 'GET',
                self::ROW_REQUEST => '/v1/tickets/',
                self::ROW_PARAMS => '',
                self::ROW_DESCRIPTION => 'Default tickets list',
            ],
            [
                self::ROW_METHOD => 'GET',
                self::ROW_REQUEST => '/v1/route/',
                self::ROW_PARAMS => '*from, *to, type = [default, rand]',
                self::ROW_DESCRIPTION => 'Create route by tickets. Default tickets you can check /v1/tickets/, or default tickets for testing by random',
            ],
        ];
    }
}