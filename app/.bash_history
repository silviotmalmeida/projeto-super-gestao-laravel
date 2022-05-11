cd /root/
django-admin startproject loja .
python3 manage.py startapp product
python3 manage.py startapp request
python3 manage.py startapp profile
exit
cd /root/
django-admin startproject loja .
python3 manage.py startapp produto
python3 manage.py startapp pedido
python3 manage.py startapp perfil
exit
cd /root/
cd ..
pip3 install django-debug-toolbar
exit
cd /root/
python3 manage.py makemigrations
python3 manage.py migrate
exit
cd /root/
python3 manage.py makemigrations
python3 manage.py migrate
exit
cd /root/
python3 manage.py makemigrations
python3 manage.py migrate
exit
cd /root/
python3 manage.py makemigrations
python3 manage.py migrate
exit
cd /root/
python3 manage.py makemigrations
python3 manage.py migrate
exit
cd /root/
python3 manage.py makemigrations
python3 manage.py migrate
exit
cd /root/
python3 manage.py createsuperuser
python3 manage.py createsuperuser
python3 manage.py makemigrations
python3 manage.py migrate
python3 manage.py createsuperuser
exit
python3 manage.py makemigrations
cd /root/
python3 manage.py makemigrations
python3 manage.py migrate
python3 manage.py createsuperuser
exit
cd /root/
python3 manage.py makemigrations
python3 manage.py migrate
python3 manage.py createsuperuser
exit
cd /root/
python3 manage.py migrate
python3 manage.py createsuperuser
exit
cd /root/
python3 manage.py migrate
python3 manage.py createsuperuser
exit
cd /root/
python3 manage.py makemigrations
exit
cd /root; composer create-project --prefer-dist laravel/laravel app_super_gestao "7.0.0"
cd /root; composer create-project --prefer-dist laravel/laravel app_super_gestao "7.0.0"
apt install php7.4-zip
cd /root; composer create-project --prefer-dist laravel/laravel app_super_gestao "7.0.0"
cd /root/app_super_gestao/public/
php -S localhost:8080
php -S 0.0.0.0:8080
exit
cd /root/
composer create-project --prefer-dist laravel/laravel app_super_gestao "7.0.0"
exit
cd /root/app_super_gestao/
php artisan make:controller IndexController
php artisan make:controller AboutController
php artisan make:controller ContactController
exit
cd /root/app_super_gestao/
php artisan make:controller ProviderController
exit
cd /root/app_super_gestao/
php artisan make:model SiteContact -m
exit
cd /root/app_super_gestao/
php artisan migrate
php artisan migrate
exit
cd /root/app_super_gestao/
php artisan make:model Provider
php artisan make:model Provider -m
exit
php artisan make:migration alter_providers_table_new_columns
cd /root/app_super_gestao/
php artisan make:migration alter_providers_table_new_columns
exit
cd /root/app_super_gestao/
php artisan make:model Product -m
exit
cd /root/app_super_gestao/
php artisan make:migration create_product_detail_table
exit
php artisan make:migration create_units_table
cd /root/app_super_gestao/
php artisan make:migration create_units_table
exit
cd /root/app_super_gestao/
php artisan make:seeder ProviderSeeder
exit
cd /root/app_super_gestao/
php artisan make:seeder SiteContactSeeder
exit
cd /root/app_super_gestao/
php artisan make:factory SiteContactFactory --model=SiteContact
exit
cd /root/app_super_gestao/
php artisan make:model ContactReason -m
php artisan make:seeder ContactReasonSeeder
exit
cd /root/app_super_gestao/
php artisan make:controller LoginController
exit
cd /root/app_super_gestao/
php artisan make:middleware CustomAuthMiddleware
exit
cd /root/app_super_gestao/
php artisan make:controller HomeController
php artisan make:controller ClientController
php artisan make:controller ProductController
exit
cd /root/app_super_gestao/
php artisan make:controller --resource ProductController
exit
php artisan make:seeder UnitSeeder
cd /root/app_super_gestao/
php artisan make:seeder UnitSeeder
exit
cd /root/app_super_gestao/
php artisan make:controller --resource UnitController
php artisan make:model Unit
exit
cd /root/app_super_gestao/
php artisan make:seeder ProductSeeder
exit
cd /root/app_super_gestao/
php artisan route:list
exit
cd /root/app_super_gestao/
php artisan make:seeder UserSeeder
exit
cd /root/app_super_gestao/
php artisan make:model ProductDetail
php artisan make:seeder ProductDetailSeeder
exit
cd /root/app_super_gestao/
php artisan make:controller --resource ProductDetailController
exit
