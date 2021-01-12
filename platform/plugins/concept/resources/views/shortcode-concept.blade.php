
@php
    $cities=get_data();
    //  $cities = collect([]);
    if (is_plugin_active('concepts')) {
        $cities = app(ConceptInterface::class)->advancedGet([
            'condition' => [
                'concepts.is_featured' => true,
                'concepts.status'      => BaseStatusEnum::PUBLISHED,
            ],
            'take'      => theme_option('number_of_featured_cities', 10),
        ]);
    }
@endphp
@if ($cities->count())
    <div class="container-fluid w90">

        <div class="padtop70">
            <div class="areahome">
            
                <div class="row">
                    <div class="col-12">
                        <h2>{{ __('Properties by locations') }}</h2>
                        {{-- <p>{{ theme_option('home_description_for_properties_by_locations') }}</p> --}}
                    </div>
                </div>
                <div style="position:relative;">
                    <div class="owl-carousel" id="cityslide">
                        @foreach($cities as $city)
                            <div class="item itemarea">
                                {{-- <a href="{{ route('public.properties-by-city', $city->slug) }}"> --}}
                                    <img src="{{ RvMedia::getImageUrl($city->image, 'small', false, RvMedia::getDefaultImage()) }}" alt="{{ $city->name }}">
                                    <h4>{{ $city->name }}</h4>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <i class="am-next"><img src="{{ Theme::asset()->url('images/aleft.png') }}" alt="pre"></i>
                    <i class="am-prev"><img src="{{ Theme::asset()->url('images/aright.png') }}" alt="next"></i>
                </div>
            </div>

        </div>
    </div>
@endif
