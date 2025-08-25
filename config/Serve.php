<?php

class Serve
{
    private string $host;
    private int $port;
    private string $docRoot = 'public';
    private string $phpBin;

    public function __construct(
        string $host = '127.0.0.1',
        int $port = 8000,
        ?string $phpBin = null
    ) {
        $this->host = $host;
        $this->port = $port;
        $this->phpBin = $phpBin ?: PHP_BINARY;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getPort(): int
    {
        return $this->port;
    }

    public function startServer(): void
    {
        if ($this->isFunctionDisabled('exec') && $this->isFunctionDisabled('shell_exec')) {
            throw new \RuntimeException("Both exec() and shell_exec() are disabled in php.ini; can't launch the server.");
        }

        if (!is_dir($this->docRoot)) {
            throw new \RuntimeException("Docroot '{$this->docRoot}' does not exist. Create it or set the correct -t path.");
        }

        if ($this->isPortInUse($this->host, $this->port)) {
            throw new \RuntimeException("Port {$this->port} is already in use at {$this->host}. Try a different port.");
        }

        $addr = $this->host . ':' . $this->port;
        $log  = sys_get_temp_dir() . DIRECTORY_SEPARATOR . "php_server_{$this->port}.log";

        $cmd = sprintf(
            '"%s" -S %s -t "%s"',
            $this->phpBin,
            $addr,
            $this->docRoot
        );

        if (stripos(PHP_OS_FAMILY, 'Windows') === 0) {
            $full = 'start "" /B ' . $cmd . " >NUL 2>&1";
            echo "Server started. Visit http://{$this->host}:{$this->port}\n";
        } else {
            $pidFile = sys_get_temp_dir() . DIRECTORY_SEPARATOR . "php_server_{$this->port}.pid";
            $full = sprintf(
                'nohup %s >> %s 2>&1 & echo $! > %s',
                $cmd,
                escapeshellarg($log),
                escapeshellarg($pidFile)
            );
        }

        $this->runDetached($full);

        usleep(300000);

        if (!$this->isPortInUse($this->host, $this->port)) {
            throw new \RuntimeException("Tried to start PHP server, but nothing is listening on http://{$addr}. Check {$log} for errors.");
        }
    }

    private function runDetached(string $command): void
    {
        if (!$this->isFunctionDisabled('exec')) {
            exec($command);
        } elseif (!$this->isFunctionDisabled('shell_exec')) {
            shell_exec($command);
        } else {
            throw new \RuntimeException("Cannot run commands: exec() and shell_exec() are both disabled.");
        }
    }

    private function isPortInUse(string $host, int $port): bool
    {
        $conn = @fsockopen($host, $port, $errno, $errstr, 0.2);
        if (!$conn) return false;
        fclose($conn);
        return true;
    }

    private function isFunctionDisabled(string $fn): bool
    {
        $disabled = ini_get('disable_functions');
        if (!$disabled) return false;
        $list = array_map('trim', explode(',', $disabled));
        return in_array($fn, $list, true);
    }
}

try {
    $server = new Serve();
    $server->startServer();
    echo "Server started. Visit http://{$server->getHost()}:{$server->getPort()}\n";
} catch (Throwable $e) {
    echo "Failed to start server: " . $e->getMessage() . "\n";
}
