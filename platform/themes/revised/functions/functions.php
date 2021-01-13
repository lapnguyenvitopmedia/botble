<?php
register_sidebar([
    'id'          => 'footer_sidebar',
    'name'        => __('Footer sidebar'),
    'description' => __('This is footer sidebar section'),
]);

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

    ])
    ->setField([
        'id'         => 'address',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'text',
        'label'      => __('Address'),
        'attributes' => [
            'name'    => 'address',
            'value'   => null,
            'options' => [
                'class'        => 'form-control',
                'data-counter' => 255,
            ],
        ],
    ])
    ->setField([
        'id'         => 'website',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'url',
        'label'      => __('Website'),
        'attributes' => [
            'name'    => 'website',
            'value'   => null,
            'options' => [
                'class'        => 'form-control',
                'data-counter' => 255,
            ],
        ],
    ])
    ->setField([
        'id'         => 'contact_email',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'email',
        'label'      => __('Email'),
        'attributes' => [
            'name'    => 'contact_email',
            'value'   => null,
            'options' => [
                'class'        => 'form-control',
                'data-counter' => 120,
            ],
        ],
    ])
    ->setField([
        'id'         => 'hotline',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'text',
        'label'      => 'Hotline',
        'attributes' => [
            'name'    => 'hotline',
            'value'   => null,
            'options' => [
                'class'        => 'form-control',
                'placeholder'  => 'Hotline',
                'data-counter' => 30,
            ],
        ],
    ])
    ->setField([
        'id'         => 'logo_footer',
        'section_id' => 'opt-text-subsection-logo',
        'type'       => 'mediaImage',
        'label'      => __('Logo in Footer'),
        'attributes' => [
            'name'  => 'logo_footer',
            'value' => null,
        ],
    ])
    ->setField([
        'id'         => 'number_of_featured_cities',
        'type'       => 'number',
        'label'      => 'Number of featured cities on homepage',
        'attributes' => [
            'name'    => 'number_of_featured_cities',
            'value'   => 10,
            'options' => [
                'class' => 'form-control',
            ],
        ],
    ])
    ->setField([
        'id'         => 'copyright',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'text',
        'label'      => __('Copyright'),
        'attributes' => [
            'name'    => 'copyright',
            'value'   => null,
            'options' => [
                'class'        => 'form-control',
                'placeholder'  => __('Change copyright'),
                'data-counter' => 255,
            ],
        ],
        'helper'     => __('Copyright on footer of site'),
    ])
;
add_action('init', function () {
    config(['filesystems.disks.public.root' => public_path('storage')]);
}, 124);

RvMedia::addSize('featured', 825, 550)
    ->addSize('medium', 540, 600)
    ->addSize('small', 540, 300)
    ->addSize('banner', 250, 355);

add_shortcode('a-shortcode', 'A short code', 'A short code', function ($shortCode) {
    //return 'content of shortcode is here';
    //return \Botble\Career\Repositories\Eloquent\CareerRepository::getlist();

    return get_list_career();
});


