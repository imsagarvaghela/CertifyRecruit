<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IPFilterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Define an array of allowed IP addresses
        $allowedIPs = [
            '2405:201:2000:8af2:4d8a:75a8:861e:30e7',
            '2405:201:2011:dfc5:845d:d756:78a8:d3f9',
            '2405:201:2011:dfc5:ecde:5cca:2031:fd6',
            '2402:8100:2040:93c:84da:17ff:fe50:3f27',
            '2405:201:2011:dfc5:5c71:ea85:b399:e2dc',
            '2405:201:2011:dfc5:50b0:8dd1:f539:e40f',
            '2409:40c1:101a:db87:8000::',
            '2405:201:2011:dfc5:b451:de77:46b1:35e0',
            // '103.251.19.104',
            // Add your specific allowed IP addresses here
        ];

        $visitorIP = $request->ip();

        if (!in_array($visitorIP, $allowedIPs)) {
            return redirect('/coming-soon'); // Redirect to the coming soon page
        }

        return $next($request);
    }
}
