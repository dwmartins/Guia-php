<?php

namespace App\Core;

use App\Http\Request;

class Core {
    public static function dispatch(array $routes) {
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $prefixController = 'App\\Controllers\\';

        $routesFound = false;

        foreach($routes as $route) {
            $pattern = '#^' . preg_replace('/{id}/', '([\w-]+)', $route['path']) . '/?$#';

            if(preg_match($pattern, $url, $matches)) {
                array_shift($matches);

                $routesFound = true;

                if ($_SERVER['REQUEST_METHOD'] !== $route['method']) {
                    continue;
                }

                $middlewares = $route['middlewares'] ?? [];
                // Checks if there is middleware on the route;
                if(count($middlewares)) {
                    if (!self::applyMiddlewares($middlewares, new Request)) {
                        return;
                    }
                }

                [$controller, $action] = explode('@', $route['action']); 

                $controller = $prefixController . $controller;

                if (!class_exists($controller) || !method_exists($controller, $action)) {
                    self::handleRouteNotFound($controller, $action);
                    return;
                }

                if(self::checkMaintenanceMode($url)) {
                    return;
                }

                $extendController = new $controller();
                $result = $extendController->$action(new Request, $matches);

                if (is_array($result) && isset($result['view']) && isset($result['data'])) {
                    extract($result['data']);
                    $view = $result['view'];

                    require __DIR__ . "/../views/master.php";
                }

                return;
            }
        }

        if (!$routesFound) {
            $view = "publicView/pageNotFound.php";
            $title = TITLE_PAGE_NOT_FOUNT;

            require __DIR__ . "/../views/master.php";
        } else {
            self::methodNotAllowedResponse($url);
        }
    }

    private static function applyMiddlewares(array $middlewares, Request $request): bool {
        foreach ($middlewares as $middleware) {
            if (is_array($middleware) && count($middleware) >= 2 && is_string($middleware[0]) && method_exists($middleware[0], $middleware[1])) {
                $middlewareClass = new $middleware[0]();
                $middlewareMethod = $middleware[1];

                return $middlewareClass->$middlewareMethod($request);
            } else {
                logError("Invalid middleware format");
                self::internalServerErrorResponse();
                return false;
            }
        }
    }

    private static function methodNotAllowedResponse($url) {
        logError('The "' . $_SERVER['REQUEST_METHOD'] . '" method is not allowed in "' . $url . '"');
        http_response_code(405);
        echo "The (" . $_SERVER['REQUEST_METHOD'] . ") method is not allowed in ($url)";
    }

    private static function handleRouteNotFound($controller, $action) {
        logError("Class or method not found: $controller@$action");
        http_response_code(500);
        echo "Class or method not found for this route.";
    }

    private static function internalServerErrorResponse() {
        http_response_code(500);
        echo "Invalid middleware format";
    }

    private static function checkMaintenanceMode(string $url) {
        if(getSetting('maintenance') == "on") {
            define("MAINTENANCE", true);

            // If an administrator is logged in, next
            if(isAdmin()) {
                return false;
            }

            // If you go to the app url, next
            if(strpos($url, '/app') === 0) {
                return false;
            }

            $view = "publicView/maintenance.php";
            $title = TITLE_MAINTENANCE;

            require __DIR__ . "/../views/master.php";
            return true;
        }

        define("MAINTENANCE", false);
        return false;
    }
}
