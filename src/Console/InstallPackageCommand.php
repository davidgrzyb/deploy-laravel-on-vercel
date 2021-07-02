<?php

namespace DavidGrzyb\DeployLaravelOnVercel\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallPackageCommand extends Command
{
    protected $signature = 'deploy-laravel-on-vercel:install';

    protected $description = 'Install the assets required for deploying Laravel on Vercel.';

    public function handle()
    {
        $this->info('Publishing assets...');

        if (! $this->filesExist()) {
            $this->publishAssets();
            $this->info('Published asset files');
        } else {
            if ($this->shouldOverwriteConfig()) {
                $this->info('Overwriting asset files...');
                $this->publishAssets(true);
            } else {
                $this->info('Existing asset files were not overwritten');
            }
        }

        $this->info('Installed Vercel assets.');
    }

    private function filesExist()
    {
        return File::exists(base_path('api/index.php'))
            && File::exists(base_path('vercel.json'))
            && File::exists(base_path('.vercelignore'));
    }

    private function shouldOverwriteConfig()
    {
        return $this->confirm(
            'Asset files for Vercel already exist. Do you want to overwrite them?',
            false
        );
    }

    private function publishAssets($forcePublish = false)
    {
        $params = [
            '--provider' => "DavidGrzyb\DeployLaravelOnVercel\DeployLaravelOnVercelServiceProvider",
            '--tag' => "assets"
        ];

        if ($forcePublish === true) {
            $params['--force'] = '';
        }

        $phpVercelVersion = $this->ask('Which version of php-vercel would you like to set?', 'php-vercel@0.4.0');
        $appUrl = $this->ask('Which APP_URL would you like to set?', config('app.url'));

        $template = file_get_contents(__DIR__ . '/../../assets/vercel.json.stub');

        $contents = str_replace('{{ phpVercelVersion }}', $phpVercelVersion, $template);
        $contents = str_replace('{{ appUrl }}', $appUrl, $contents);

        file_put_contents(base_path('vercel.json'), $contents);

        $this->call('vendor:publish', $params);
    }
}