<?php

namespace Botble\Banners\Providers;

use Botble\Banners\Models\Banners;
use Illuminate\Support\ServiceProvider;
use Botble\Banners\Repositories\Caches\BannersCacheDecorator;
use Botble\Banners\Repositories\Eloquent\BannersRepository;
use Botble\Banners\Repositories\Interfaces\BannersInterface;
use Botble\Base\Supports\Helper;
use Event;
use Theme;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class BannersServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(BannersInterface::class, function () {
            return new BannersCacheDecorator(new BannersRepository(new Banners));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/banners')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadRoutes(['web'])
            ->publishAssets();;

        Event::listen(RouteMatched::class, function () {
            if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
                \Language::registerModule([Banners::class]);
            }

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-banners',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/banners::banners.name',
                'icon'        => 'fa fa-list',
                'url'         => route('banners.index'),
                'permissions' => ['banners.index'],
            ]);
        });
        //banner
        add_shortcode('banner', 'Banner', 'Nhập tên banner', function($value) {
            return view('plugins/banners::shortcode-banner',['slid'=>$value->content]);
        });
        shortcode()->setAdminConfig('banner', view('plugins/banners::partials.banner-admin-config')->render());
    }
}
