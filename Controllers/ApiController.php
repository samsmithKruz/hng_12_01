<?php


class ApiController
{
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            http_response_code(405);
            jsonResponse(['error' => 'Method Not Allowed'], 405);
        }
        jsonResponse([
            'status' => true,
            'message'=>'welcome to api route.'
        ]);
    }
    public function classify_number()
    {
        $number = request('get')->number ?? false;

        if (!filter_var($number, FILTER_VALIDATE_INT) !== false) {
            jsonResponse([
                'number' => 'alphabet',
                'error' => true
            ], 400);

        }
        $number = (int) $number;
        $c = httpRequest("http://numberapi.com/{$number}/trivia");

        jsonResponse([
            "number" => $number,
            "is_prime" => isPrime($number),
            "is_perfect" => isPerfect($number),
            "properties" => getProperties($number),
            "digit_sum" => digitSum($number),
            "fun_fact" => $c['data']
        ]);
    }
}
