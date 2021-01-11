<?php

use Botble\Widget\AbstractWidget;

class SubcribeWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * @var string
     */
    protected $frontendTemplate = 'frontend';

    /**
     * @var string
     */
    protected $backendTemplate = 'backend';

    /**
     * @var string
     */
    protected $widgetDirectory = 'subcribe';

    /**
     * Widget constructor.
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function __construct()
    {
        parent::__construct([
            'name'        => 'Subcribe',
            'contents'    =>'Contents',
            'description' => 'Widget description',
        ]);
    }
}
