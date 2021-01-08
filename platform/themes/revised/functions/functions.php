<?php

register_page_template([
    'no-sidebar' => __('Noo sidebar'),
]);

register_page_template([
    'more-template' => __('More template'),
]);

theme_option()->setField([
        'id'         => 'site_description',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'textarea',
        'label'      => __('Site description'),
        'attributes' => [
            'name'    => 'site_description',
            'value'   => null,
            'options' => [
                'class'        => 'form-control',
                'data-counter' => 255,
            ],
        ],
    ]);

add_shortcode('a-shortcode', 'A short code', 'A short code', function ($shortCode) {
    //return 'content of shortcode is here';
    //return \Botble\Career\Repositories\Eloquent\CareerRepository::getlist();
    return get_list_career();
});