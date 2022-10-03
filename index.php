<?php

header('Content-Type: application/json; charset=utf-8');

$url = $_GET['url'];

function get_video_info($url)
{
    $curl = curl_init("https://savemp3.net/wp-json/api/v1/get_video_info");

    $data = [
        'url' => $url
    ];
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $BG = curl_exec($curl);
    curl_close($curl);

    $js = json_decode($BG, 1)['tasks'];

    for ($i = 0; $i < count($js); $i++) {

        if ($js[$i]['bitrate'] == "128") {
            $data1 = $js[$i]['hash'];
        }
    }

    return $data1;
}

function download($hash)
{
    $curl = curl_init("https://savemp3.net/wp-json/api/v1/download");

    $data = [
        'hash' => $hash
    ];
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $BG = curl_exec($curl);
    curl_close($curl);

    $js = json_decode($BG, 1);

    return $js['taskId'];
}

function status($taskId)
{
    $curl = curl_init("https://savemp3.net/wp-json/api/v1/status");

    $data = [
        'taskId' => $taskId
    ];
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $BG = curl_exec($curl);
    curl_close($curl);

    $js = json_decode($BG, 1);

    return $js;
}

$data = status(download(get_video_info($url)));

$array['title'] = $data['title'];
$array['quality'] = $data['quality'];
$array['size'] = $data['filesize'];
$array['url'] = $data['download'];

if (isset($url) and $data['download']) {
    echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
} else {
    $array['status'] = "error";
    echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}
