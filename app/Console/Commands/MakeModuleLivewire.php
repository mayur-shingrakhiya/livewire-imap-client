<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeModuleLivewire extends Command
{
    protected $signature = 'module:make-livewire {module} {name}';
    protected $description = 'Create a Livewire component inside a module';

    public function handle()
    {
        $module = $this->argument('module');
        $name = $this->argument('name');

        $className = Str::studly(class_basename($name));
        $kebabName = Str::kebab($name);

        $modulePath = base_path("Modules/{$module}");
        $componentPath = "{$modulePath}/Livewire/{$className}.php";
        $viewPath = "{$modulePath}/Resources/views/livewire/{$kebabName}.blade.php";

        // Ensure directories
        File::ensureDirectoryExists(dirname($componentPath));
        File::ensureDirectoryExists(dirname($viewPath));

        // PHP class file
        $namespace = "Modules\\{$module}\\Livewire";
        $viewAlias = strtolower($module) . "::livewire.{$kebabName}";

        $classContent = <<<PHP
<?php

namespace {$namespace};

use Livewire\\Component;

class {$className} extends Component
{
    public function render()
    {
        return view('{$viewAlias}');
    }
}
PHP;

        File::put($componentPath, $classContent);

        // Blade view file
        $bladeContent = <<<BLADE
<div>
    <!-- {$className} component for {$module} module -->
</div>
BLADE;

        File::put($viewPath, $bladeContent);

        $this->info("✅ Livewire component '{$className}' created in module '{$module}'");
    }
}
