role :web, %w{ root@45.79.24.69 }
set :deploy_to, '/var/www/mauisms.com'
set :branch, 'main'

namespace :deploy do

desc 'copy env'
task :copy_env do
  on roles(:web) do
    execute :ln, "-s /var/protected/env/mauisms.production.env #{release_path}/.env"
  end
end

after :updated, 'deploy:copy_env'

desc 'install'
task :install do
    on roles(:web) do
        within release_path do
			#execute :ln, "-s #{shared_path}/storage #{release_path}/storage"
            execute :composer, "install --quiet --optimize-autoloader"
            execute :chmod, "u+x artisan" # make artisan executable
            execute :php, "artisan migrate --force"
        end
    end
end

after :copy_env, 'deploy:install'

desc "fix permissions"
task :fix_permissions do
  on roles(:web) do
    within release_path  do
      execute :chmod, "-R 777 storage/"
      execute :chmod, "-R 777 bootstrap/cache"
    end
  end
end

after :install, 'deploy:fix_permissions'

desc "node preprosessing"
task :node_preprosessing do
  on roles(:web) do
    within release_path  do
			execute "cd #{release_path} && source ~/.nvm/nvm.sh && npm install && npm run prod"
    end
  end
end

after :fix_permissions, 'deploy:node_preprosessing'

end
