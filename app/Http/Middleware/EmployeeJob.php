<?php

namespace App\Http\Middleware;

use App\Models\Admin\Employee;
use App\Models\Admin\Job;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EmployeeJob
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $employee = $request->job->employees->where('id', $request->employee->id)->first();
        if (!$employee) {
            throw new NotFoundHttpException();
        }
        return $next($request);
    }
}
