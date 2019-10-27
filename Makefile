conf:
	sudo apt-get install php7.2 php7.2-mbstring php7.2-mysql php7.2-intl php7.2-xml composer # isso só serve pra sistemas que usam o apt
	composer install --no-scripts
	npm install
	npm run dev
	cp .env.example .env # copia o example
	php artisan key:generate # gera a chave
	sudo apt-get install mysql-server-5.7 # instala o bd
	$(MAKE) bd-conf # roda a regra do bd-conf

bd-conf:
	mysql -u root -p --execute="drop database if exists manitoramento_saude; create database manitoramento_saude; drop user if exists 'saude'; create user 'saude' identified by 'saude321'; grant all privileges on manitoramento_saude.* to 'saude';"
	sed -i 's/DB_DATABASE.*/DB_DATABASE=manitoramento_saude/' .env # ajusta o nome do banco no .env
	sed -i 's/DB_USERNAME.*/DB_USERNAME=saude/' .env # ajusta o nome de usuário no .env
	sed -i 's/DB_PASSWORD.*/DB_PASSWORD=saude321/' .env # ajusta a senha no .env
	php artisan migrate:refresh --seed
	php artisan serve