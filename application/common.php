<?php
function status($status)
{
    if ($status == 1) {
        return "正常";
    } else {
        return "待审";
    }
}

function showAttitude($status, $message = '', $data = array())
{
    return [
        'status' => $status,
        'message' => $message,
        'data' => $data
    ];
}
