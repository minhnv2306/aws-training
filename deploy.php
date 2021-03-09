<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'my_project');

// Project repository
set('repository', 'https://github.com/minhnv2306/aws-training.git');

// [Optional] Allocate tty for git clone. Default value is false.
// Fix issue for github action: https://github.com/deployphp/deployer/issues/1713
set('git_tty', false);

// Default branch
set('branch', 'FIX-change-host-docker');

// Shared files/dirs between deploys
add('shared_files', [
    '.env',
]);

// Hosts

host('3.142.12.48')
    ->user('ec2-user')
    ->set('deploy_path', '/var/www/html/demo81');
// Tasks

// task('build', function () {
//     run('cd {{release_path}} && build');
// });

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.
// before('deploy:symlink', 'artisan:migrate');
