# Mudar nome do banco de dados no arquivo .env
# ------------------------------------------
# Configurar o nome do banco de dados no arquivo .env.

# Iniciar o servidor local
# ------------------------
php artisan serve
# Isso "liga" o site e permite que você o acesse localmente.

# Criar um controller
# --------------------
php artisan make:controller nomeDaEntidade
# Cria um controller para a entidade especificada.

# Criar uma migration
# --------------------
php artisan make:migration nomeDaMigrate
# Cria uma migration que interagirá com o banco de dados.

# Verificar status das migrations
# --------------------------------
php artisan migrate:status
# Exibe o status das tabelas criadas e não criadas.

# Executar as migrations
# ----------------------
php artisan migrate
# Cria as tabelas no banco de dados.

# Resetar todas as migrations e recriar
# -------------------------------------
php artisan migrate:fresh
# Deleta todas as migrations e recria a estrutura do banco de dados.

# Desfazer a última migration
# ---------------------------
php artisan migrate:rollback
# Desfaz a última modificação no banco de dados.

# Resetar todas as migrations
# ---------------------------
php artisan migrate:reset
# Desfaz todas as migrações, apagando todas as tabelas do banco de dados.

# Resetar e recriar todas as migrations
# -------------------------------------
php artisan migrate:refresh
# Desfaz e recria todas as tabelas no banco de dados.

# Criar um model
# --------------
php artisan make:model nomeModel
# Cria um model para interagir com o banco de dados.

# Instalar Jetstream (um pacote open source para Laravel)
# -------------------------------------------------------
composer require laravel/jetstream
# Instala o pacote Jetstream.

# Instalar Jetstream com Livewire (requer Node.js no PATH)
# ---------------------------------------------------------
php artisan jetstream:install livewire
# Instala Jetstream com suporte a Livewire para quem utiliza o Livewire.

# Instalar dependências e compilar recursos
# -----------------------------------------
npm install
# Instala as dependências necessárias.

npm run dev
# Compila os recursos necessários.

# Publicar arquivos de rotas
# ---------------------------
php artisan vendor:publish
# Exibe todos os arquivos de rotas disponíveis para publicação.

# Dica
# ----
# Sempre que criar um controller ou migration, execute os comandos com o servidor PHP em execução.
# Assim, basta selecionar o número correspondente à ação desejada durante a execução.
