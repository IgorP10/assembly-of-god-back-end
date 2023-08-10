<?php

declare(strict_types=1);

namespace Kernel\Configuration;

/**
 * This class is responsible for managing environment settings
 */
class Configuration
{
    private static array $ENVIRONMENTS_VARIABLES;

    private static array $ENVIRONMENTS_VARIABLES_FROM_FILE;

    private static array $ENVIRONMENTS_ALL;

    /**
     * @return mixed[]
     */
    private function createEnvironments() : array
    {
        if (empty(self::$ENVIRONMENTS_VARIABLES)) {
            self::$ENVIRONMENTS_VARIABLES = (array)getenv();
        }

        return self::$ENVIRONMENTS_VARIABLES;
    }

    private function createEnvironmentsFromFile() : array
    {
        if (empty(self::$ENVIRONMENTS_VARIABLES_FROM_FILE)) {
            $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../../', '.env');
            $dotenv->load();
            self::$ENVIRONMENTS_VARIABLES_FROM_FILE = $_ENV;
        }

        return self::$ENVIRONMENTS_VARIABLES_FROM_FILE;
    }

    public function getEnvironments() : array
    {
        if (empty(self::$ENVIRONMENTS_ALL)) {
            self::$ENVIRONMENTS_ALL = array_merge($this->createEnvironments(), $this->createEnvironmentsFromFile());
        }

        return self::$ENVIRONMENTS_ALL;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    public function set(string $key, $value) : self
    {
        // Starting file if not stated
        $this->createEnvironmentsFromFile();

        self::$ENVIRONMENTS_VARIABLES_FROM_FILE[$key] = $value;
        self::$ENVIRONMENTS_ALL = [];

        return $this;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    public function get(string $key, $defaultValue = null)
    {
        $environments = $this->getEnvironments();

        return $environments[$key] ?? $defaultValue;
    }
}
