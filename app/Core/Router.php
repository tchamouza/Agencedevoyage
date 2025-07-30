<?php
namespace App\Core;

class Router {
    private array $routes = [];

    public function get(string $path, callable|array $callback): void {
        $this->routes['GET'][$this->normalize($path)] = $callback;
    }

    public function post(string $path, callable|array $callback): void {
        $this->routes['POST'][$this->normalize($path)] = $callback;
    }

    public function resolve() {
        $method = $_SERVER['REQUEST_METHOD'];

        // Nettoyage du chemin URI
        $uri = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        $scriptName = dirname($_SERVER['SCRIPT_NAME']);
        $scriptName = str_replace('\\', '/', $scriptName);
        $uri = '/' . ltrim(str_replace($scriptName, '', $uri), '/');
        $uri = $this->normalize($uri);

        if (isset($this->routes[$method][$uri])) {
            $callback = $this->routes[$method][$uri];

            if (is_array($callback)) {
                [$controllerClass, $action] = $callback;

                if (class_exists($controllerClass)) {
                    $controller = new $controllerClass();

                    if (method_exists($controller, $action)) {
                        return call_user_func([$controller, $action]);
                    } else {
                        http_response_code(500);
                        echo "Erreur : Méthode <strong>$action</strong> introuvable dans <strong>$controllerClass</strong>";
                        return;
                    }
                } else {
                    http_response_code(500);
                    echo "Erreur : Contrôleur <strong>$controllerClass</strong> introuvable";
                    return;
                }
            }

            return call_user_func($callback);
        }

        http_response_code(404);
        $this->renderError404();
    }

    private function normalize(string $path): string {
        $path = rtrim($path, '/');
        return $path === '' ? '/' : $path;
    }

    private function renderError404(): void {
        $errorView = __DIR__ . '/../Views/errors/404.php';
        if (file_exists($errorView)) {
            include $errorView;
        } else {
            echo "404 - Page non trouvée.";
        }
    }
}
