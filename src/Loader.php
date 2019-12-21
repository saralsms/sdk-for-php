<?php

final class Loader
{
    /**
     * Loader constructor.
     * @throws SaralSMSException
     */
    public function __construct()
    {
        $this->loadEnv();
    }

    /**
     * @throws SaralSMSException
     */
    private function loadEnv()
    {
        // load env file
        try {
            $lines = file(dirname(__DIR__) . '/' . '.env.default');
            foreach ($lines as $line) {
                $line = trim($line);
                if (!preg_match('/^#/', $line)) {
                    $parts = explode('=', $line);
                    print_r($parts);
                    if (count($parts) === 2) {
                        list($key, $val) = $parts;
                        $this->setEnv(trim($key), trim($val));
                    }
                }
            }
        } catch (Exception $e) {
            throw new SaralSMSException('Couldn\'t load environment variables from a file.');
        }
    }

    public function getEnv($key, $default = '')
    {
        if (isset($_ENV[$key])) {
            return $_ENV[$key];
        }
        return $default;
    }

    public function setEnv($key, $val)
    {
        $_ENV[$key] = $val;
    }
}
