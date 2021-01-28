<?php
require_once __DIR__.'/../vendor/autoload.php';


use Simplex\StringResponseListener;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpFoundation\Request;

$routes = include __DIR__.'/../src/app.php';
$container = include __DIR__.'/../src/container.php';


$container->register('listener.string_response', StringResponseListener::class);
$container->getDefinition('dispatcher')
    ->addMethodCall('addSubscriber', [new Reference('listener.string_response')])
;


//$container->setParameter('charset', 'UTF-8');
//$container->register('listener.response', HttpKernel\EventListener\ResponseListener::class)
//    ->setArguments(['%charset%'])
//;

//$container->setParameter('routes', include __DIR__.'/../src/app.php');
//$container->register('matcher', Routing\Matcher\UrlMatcher::class)
//    ->setArguments(['%routes%', new Reference('context')])
//;


$request = Request::createFromGlobals();

$response = $container->get('framework')->handle($request);

$response->send();