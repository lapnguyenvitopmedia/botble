<?php

namespace Botble\Revslider\Providers;

use Botble\Revslider\Models\Revslider;
use Illuminate\Support\ServiceProvider;
use Botble\Revslider\Repositories\Caches\RevsliderCacheDecorator;
use Botble\Revslider\Repositories\Eloquent\RevsliderRepository;
use Botble\Revslider\Repositories\Interfaces\RevsliderInterface;
use Botble\Base\Supports\Helper;
use Event;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class RevsliderServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(RevsliderInterface::class, function () {
            return new RevsliderCacheDecorator(new RevsliderRepository(new Revslider));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/revslider')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadRoutes(['web'])
            ->loadAndPublishViews();

        Event::listen(RouteMatched::class, function () {
            if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
                \Language::registerModule([Revslider::class]);
            }

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-revslider',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/revslider::revslider.name',
                'icon'        => 'fa fa-list',
                'url'         => route('revslider.index'),
                'permissions' => ['revslider.index'],
            ]);
        });

        //add shortcode
        add_shortcode('revslider', 'Revslider', 'Revslider Alias', function ($name) {
            return view('plugins/revslider::partials.slider', ['alias' => $name->content]);
        });
        shortcode()->setAdminConfig('revslider', view('plugins/revslider::partials.slider-admin-config')->render());
    }
}
