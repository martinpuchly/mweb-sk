<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;
use Illuminate\Support\Facades\Cache;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => fn () => $request->user()
                ? $request->user()->only('id', 'name', 'email', 'is_admin')
                : null
            ],
            'flash' => [
                'succeed' => fn () => $request->session()->get('succeed'),
                'notice' => fn () => $request->session()->get('notice'),
                'error' => fn () => $request->session()->get('error'),
            ],
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },
            'recaptcha_site_key' => config('services.google_recaptcha.site_key'),
            'hour_joke'=>Cache::get('joke')
        ]);
    }
}
