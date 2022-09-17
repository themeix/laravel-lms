<?php


namespace App\Traits;


trait General
{

    private function showToastrMessage($type, $message)
    {
        switch ($type) {
            case 'success':
                return toastr()->success($message, '', ["positionClass" => "toast-bottom-right"]);
                break;
            case 'warning':
                return toastr()->warning($message, '', ["positionClass" => "toast-bottom-right"]);
                break;
            case 'error':
                return toastr()->error($message, '', ["positionClass" => "toast-bottom-right"]);
                break;
            default:
                return toastr()->success($message, '', ["positionClass" => "toast-bottom-right"]);
        }
    }
}
