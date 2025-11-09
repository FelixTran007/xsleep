<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = ['lang', 'url', 'lang_helper'];

    /**
     * @var string Current locale (vn|en)
     */
    protected string $locale = 'vn';

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Detect locale từ tên route
        $this->detectLocale();

        // Preload any models, libraries, etc, here.
        // E.g.: $this->session = service('session');
    }

    /**
     * Detect locale dựa vào route name (_vn, _en)
     */
    protected function detectLocale(): void
    {
        $router    = service('router');
        $routeOpts = $router->getMatchedRouteOptions();
        $routeName = $routeOpts['as'] ?? null;

        if ($routeName) {
            if (str_ends_with($routeName, '_vn')) {
                $this->locale = 'vn';
            } elseif (str_ends_with($routeName, '_en')) {
                $this->locale = 'en';
            }
        }

        // Set locale cho hệ thống CI4
        service('request')->setLocale($this->locale);
    }    
}
