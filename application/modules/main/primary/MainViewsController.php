<?php

use Colibri\Controller\ViewsController;


/**
 *
 */
class MainViewsController extends ViewsController
{
    public function index()
    {
        $this->view([
            'greeting' => 'Поздравляем!'
        ]);
    }
}
