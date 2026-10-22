<?php

namespace App\Http\Middleware;

use App\Models\PageView;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class TrackPageView
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (! $this->shouldTrack($request, $response)) {
            return $response;
        }

        try {
            PageView::record(
                $request->path() === '/' ? '/' : '/'.$request->path(),
                $request->session()->getId(),
                hash('sha256', $request->ip().'|'.$request->userAgent())
            );
        } catch (Throwable) {
            // Tracking never blocks the page.
        }

        return $response;
    }

    private function shouldTrack(Request $request, Response $response): bool
    {
        if (! $request->isMethod('GET') || $request->ajax() || $request->expectsJson()) {
            return false;
        }

        if ($response->getStatusCode() >= 400) {
            return false;
        }

        if ($request->is('admin*') || $request->is('login') || $request->is('logout') || $request->is('up')) {
            return false;
        }

        $path = $request->path();

        return ! preg_match('/\.(css|js|jpg|jpeg|png|gif|webp|svg|ico|woff2?|map)$/i', $path);
    }
}
