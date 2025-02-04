<?php


class ApiController
{
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            http_response_code(405);
            jsonResponse(['error' => 'Method Not Allowed'], 405);
        }
        jsonResponse([]);
        http_response_code(200);
        $data = httpRequest('http://numbersapi.com/42');
        // $data = [
        //     'email' => 'samspike46@gmail.com',
        //     'current_datetime' => date('Y-m-d\TH:i:s\Z'),
        //     'github_url' => 'https://github.com/samsmithkruz/hng12_01',
        //     // 'curl'=>
        // ];
        echo json_encode($data);
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
