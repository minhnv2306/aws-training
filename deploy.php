<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'my_project');

// Project repository
set('repository', 'git@github.com:minhnv2306/aws-training.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Default branch
set('branch', 'master');

// Shared files/dirs between deploys
add('shared_files', [
    '.env',
]);

// Hosts

host('52.15.170.75')
	->user('ubuntu')
    ->set('deploy_path', '/var/www/html/aws-training');    
    
// Tasks

// task('build', function () {
//     run('cd {{release_path}} && build');
// });

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.
before('deploy:symlink', 'artisan:migrate');
