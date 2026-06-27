<?php

use Illuminate\Contracts\Console\Kernel as ConsoleKernel;
use Symfony\Component\Console\Output\BufferedOutput;

define('LARAVEL_START', microtime(true));

require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

// Boot Laravel configuration and bootstrap services
$httpKernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$httpKernel->bootstrap();

$consoleKernel = $app->make(ConsoleKernel::class);

echo "<h1>SkillNet Database Installer</h1>";
echo "<p>Running migrations and seeding the database...</p>";

try {
    $output = new BufferedOutput();
    $status = $consoleKernel->call('migrate:fresh', [
        '--seed' => true,
        '--force' => true,
    ], $output);

    echo "<div style='background: #f4f4f4; padding: 15px; border-radius: 5px; border: 1px solid #ccc;'>";
    echo "<h3>Execution Output:</h3>";
    echo "<pre>" . htmlspecialchars($output->fetch()) . "</pre>";
    echo "</div>";

    if ($status === 0) {
        echo "<h2 style='color:green;'>🎉 Database Migrated and Seeded Successfully!</h2>";
    } else {
        echo "<h2 style='color:red;'>⚠️ Migration failed with status code: {$status}</h2>";
    }
} catch (\Exception $e) {
    echo "<h2 style='color:red;'>❌ Error occurred:</h2>";
    echo "<pre>" . htmlspecialchars($e->getMessage()) . "\n" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
}
