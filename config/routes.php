<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Zend\Expressive\Application;
use Zend\Expressive\MiddlewareFactory;

/**
 * Setup routes with a single request method:
 *
 * $app->get('/', App\Handler\HomePageHandler::class, 'home');
 * $app->post('/album', App\Handler\AlbumCreateHandler::class, 'album.create');
 * $app->put('/album/:id', App\Handler\AlbumUpdateHandler::class, 'album.put');
 * $app->patch('/album/:id', App\Handler\AlbumUpdateHandler::class, 'album.patch');
 * $app->delete('/album/:id', App\Handler\AlbumDeleteHandler::class, 'album.delete');
 *
 * Or with multiple request methods:
 *
 * $app->route('/contact', App\Handler\ContactHandler::class, ['GET', 'POST', ...], 'contact');
 *
 * Or handling all request methods:
 *
 * $app->route('/contact', App\Handler\ContactHandler::class)->setName('contact');
 *
 * or:
 *
 * $app->route(
 *     '/contact',
 *     App\Handler\ContactHandler::class,
 *     Zend\Expressive\Router\Route::HTTP_METHOD_ANY,
 *     'contact'
 * );
 */
return function (Application $app, MiddlewareFactory $factory, ContainerInterface $container): void {
    $app->get('/', Presentation\Handler\InstallHandler::class, 'install');
    $app->post('/api/agendamento', Presentation\Handler\AgendamentoHandler::class, 'agendamento');
    $app->get('/api/agendamento/:action', Presentation\Handler\AgendamentoHandler::class, 'agendamento-action');
    $app->get('/api/especialidades', Presentation\Handler\EspecialidadesHandler::class, 'especialidades');
    $app->get('/api/profissionais', Presentation\Handler\ProfissionaisHandler::class, 'profissionais');
    $app->get(
        '/api/feegowgeneric[/:r1[/:r2[/:r3]]]',
        Presentation\Handler\FeegowGenericHandler::class,
        'feegowgeneric'
    );
};
