<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Models\WebhookRequest;

class HandleRequestsController extends Controller
{
    public function __invoke(Url $url)
    {
        $method = request()->method();
        $headers = request()->headers->all();
        $ip = request()->ip();
        $body = json_encode(request()->all());

        $url
            ->requests()
            ->create(
                compact('method', 'headers', 'ip', 'body')
            );

        return response()->noContent();
    }
}
