<?php

function httpRequest($url, $method = 'GET', $data = null, $headers = [])
{
    $ch = curl_init();

    // Convert method to uppercase
    $method = strtoupper($method);

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

    // Set headers if provided
    if (!empty($headers)) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }

    // Handle data for POST, PUT, PATCH
    if ($method === 'POST' || $method === 'PUT' || $method === 'PATCH') {
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array_merge($headers, ["Content-Type: application/json"]));
    }

    // Execute request
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);

    // Close cURL session
    curl_close($ch);

    // Handle errors
    if ($error) {
        return [
            "success" => false,
            "status" => $httpCode,
            "error" => $error
        ];
    }

    // Return response in JSON format
    return [
        "success" => true,
        "status" => $httpCode,
        "data" => json_decode($response, true) ?? $response
    ];
}
function request($method)
{
    $method = strtoupper($method);

    if ($method === 'GET') {
        return (object) $_GET;
    } elseif ($method === 'POST') {
        return (object) $_POST;
    }

    return (object) [];
}
function jsonResponse($data, $code=200)
{
    header('content-type: application/json');
    http_response_code((int) $code);
    echo json_encode((array) $data);
    exit();
}
function isPrime($num) {
    if ($num < 2) return false; // 0 and 1 are not prime

    for ($i = 2; $i * $i <= $num; $i++) {
        if ($num % $i === 0) {
            return false; // If divisible, it's not prime
        }
    }
    return true; // If no divisors found, it's prime
}
function isPerfect($num) {
    if ($num < 1) return false;
    
    $sum = 0;
    for ($i = 1; $i <= $num / 2; $i++) {
        if ($num % $i === 0) {
            $sum += $i;
        }
    }
    return $sum === $num;
}
function digitSum($num) {
    return array_sum(str_split($num));
}

function isArmstrong($num) {
    $digits = str_split($num);
    $power = count($digits);
    $sum = array_sum(array_map(fn($d) => pow($d, $power), $digits));

    return $sum == $num;
}
function getProperties($num) {
    $properties = [];
    
    if (isArmstrong($num)) {
        $properties[] = "armstrong";
    }
    
    $properties[] = ($num % 2 === 0) ? "even" : "odd";
    
    return $properties;
}


