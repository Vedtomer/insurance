<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class NullToEmptyMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Modify the response data
        $content = $response->getContent();
        $content = json_decode($content, true);

        // Recursively replace null values with empty strings
        $content = $this->replaceNullWithEmpty($content);

        // Encode the modified data back to JSON
        $response->setContent(json_encode($content));

        return $response;
    }

    private function replaceNullWithEmpty($data)
    {
        if (is_array($data)) {
            foreach ($data as $key => &$value) {
                $value = $this->replaceNullWithEmpty($value);
            }
        } elseif ($data === null) {
            $data = '';
        }

        return $data;
    }
}
