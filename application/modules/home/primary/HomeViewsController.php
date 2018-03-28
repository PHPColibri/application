<?php

use Colibri\Controller\ViewsController;


/**
 *
 */
class HomeViewsController extends ViewsController
{
    public function index()
    {
        $this->view([
            'greeting' => 'Поздравляем!'
        ]);
    }
}
