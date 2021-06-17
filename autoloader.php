<?php

class autoloader
{
    // Карта для соответствия неймспейса пути в файловой системе
    protected array $namespacesMap = [];

    // Добавляем новый неймспейс в нашу карту
    public function addNamespace($namespace, $rootDir): bool
    {
        if (is_dir($rootDir)) {
            $this->namespacesMap[$namespace] = $rootDir;

            return true;
        }

        return false;
    }

    // Регистрируем метод autoload  текущего объекта как autoload по-умолчанию
    public function register()
    {
        \spl_autoload_register(array($this, 'autoload'));
    }

    // Сам метод где происходит загрузка классов
    protected function autoload($class): bool
    {
        $pathParts = explode('\\', $class);

        if (is_array($pathParts)) {
            $namespace = array_shift($pathParts);

            if (!empty($this->namespacesMap[$namespace])) {
                $filePath = $this->namespacesMap[$namespace] . '/' . \implode('/', $pathParts) . '.php';

                if (\file_exists($filePath)) {
                    require_once $filePath;

                    return true;
                }
            }
        }

        return false;
    }
}