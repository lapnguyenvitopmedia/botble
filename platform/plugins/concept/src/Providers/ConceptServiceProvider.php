<?php

namespace Botble\Concept\Providers;

use Botble\Concept\Models\Concept;
use Illuminate\Support\ServiceProvider;
use Botble\Concept\Repositories\Caches\ConceptCacheDecorator;
use Botble\Concept\Repositories\Eloquent\ConceptRepository;
use Botble\Concept\Repositories\Interfaces\ConceptInterface;
use Botble\Base\Supports\Helper;
use Event;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class ConceptServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(ConceptInterface::class, function () {
            return new ConceptCacheDecorator(new ConceptRepository(new Concept));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/concept')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadRoutes(['web'])
            ->loadAndPublishViews()
            ->publishAssets();;

        Event::listen(RouteMatched::class, function () {
            if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
                \Language::registerModule([Concept::class]);
            }

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-concept',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/concept::concept.name',
                'icon'        => 'fa fa-list',
                'url'         => route('concept.index'),
                'permissions' => ['concept.index'],
            ]);
        });
        add_shortcode('concept', 'concept', 'Nhập tên concept', function($value) {
            return view('plugins/concepts::shortcode-concept');
        });
        // shortcode()->setAdminConfig('concept', view('plugins/concepts::partials.concept-admin-config')->render());
    }
}
