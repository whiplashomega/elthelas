<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('attack_index', new Route(
    '/',
    array('_controller' => 'AppBundle:Attack:index'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('attack_show', new Route(
    '/{id}/show',
    array('_controller' => 'AppBundle:Attack:show'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('attack_new', new Route(
    '/new',
    array('_controller' => 'AppBundle:Attack:new'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('attack_edit', new Route(
    '/{id}/edit',
    array('_controller' => 'AppBundle:Attack:edit'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('attack_delete', new Route(
    '/{id}/delete',
    array('_controller' => 'AppBundle:Attack:delete'),
    array(),
    array(),
    '',
    array(),
    array('DELETE')
));

return $collection;
