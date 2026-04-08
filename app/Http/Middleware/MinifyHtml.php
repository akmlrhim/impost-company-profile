<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MinifyHtml
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Hanya minify jika response adalah teks HTML dari Illuminate\Http\Response (bukan file download/JSON/binary)
        if ($this->shouldMinify($response)) {
            $html = $response->getContent();

            $search = [
                '/<!--[^\[](.*?)[^\]]-->/s', // Remove HTML comments except IE conditions
                '/\>[^\S ]+/s',              // Remove whitespaces after tags, except space
                '/[^\S ]+\</s',              // Remove whitespaces before tags, except space
                '/(\s)+/s',                  // Shorten multiple whitespace sequences
            ];

            $replace = [
                '',
                '>',
                '<',
                '\\1',
            ];

            $buffer = preg_replace($search, $replace, $html);

            // Forcefully remove all remaining newlines to guarantee a single line string
            $buffer = str_replace(["\r\n", "\r", "\n", "\t"], " ", $buffer);
            
            // Clean up multiple spaces that might result from the above
            $buffer = preg_replace('/ {2,}/', ' ', $buffer);
            
            // Tighten tags
            $buffer = str_replace("> <", "><", $buffer);

            $response->setContent($buffer);
        }

        return $response;
    }

    protected function shouldMinify($response): bool
    {
        if (!($response instanceof \Illuminate\Http\Response)) {
            return false;
        }

        $contentType = $response->headers->get('Content-Type');
        return str_contains(strtolower($contentType ?? ''), 'text/html');
    }
}
