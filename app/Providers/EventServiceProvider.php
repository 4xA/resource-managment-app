<?php

namespace App\Providers;

use App\Models\HTMLResource;
use App\Models\LinkResource;
use App\Models\PDFResource;
use App\Models\ResourceType;
use App\Observers\PDFResourceObserver;
use App\Observers\ResourceTypeObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        PDFResource::observe(PDFResourceObserver::class);
        LinkResource::observe(ResourceTypeObserver::class);
        PDFResource::observe(ResourceTypeObserver::class);
        HTMLResource::observe(ResourceTypeObserver::class);
    }
}
