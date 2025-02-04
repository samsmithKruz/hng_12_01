<?php


class IndexController 
{
    public function index()
    {
        if($_SERVER['REQUEST_METHOD'] !== 'GET') {
            http_response_code(405);
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Method Not Allowed']);
            return;
        }
        http_response_code(200);
        header('Content-Type: application/json');
        // $data = httpRequest('http://numbersapi.com/42');
        $data = [
            'status' => true,
            'message'=>'welcome to homepage api.'
        ];
        echo json_encode($data);
    }
}
