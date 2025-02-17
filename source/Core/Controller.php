<?php

namespace Source\Core;

use Source\Support\Seo;

/**
 * 
 */
class Controller
{
    /** @var View */
    protected $view;

    /** @var Seo */
    protected $seo;

    /**
     * Controller constructor.
     * @param string|null $pathToViews
     */
    public function __construct(string $pathToViews = null)
    {
        $this->view = new View($pathToViews);
        $this->seo = new Seo();
    }
}