﻿# assembly-of-god-back-end

# Configurando ambiente de desenvolvimento

```bash
# Install docker & docker-compose
https://docs.docker.com/engine/install/
https://docs.docker.com/compose/install/

# Adicionar permissões para o docker
sudo usermod -aG docker ${USER}
sudo su - ${USER}

# Copie e edite(opcional) o arquivo .env
cp .env.example .env

# Rodar o docker-compose
docker compose up -d

# Rodar o composer
docker compose exec app composer install

# Rodar as migrations
docker compose exec app php migrate migrate --all-or-nothing --no-interaction
```

## Extra
```bash
# Criar uma migration
docker compose exec app php migrate migrations:generate

# Rodar método DOWN de uma migration
docker compose exec app php migrate migrations:execute --down Migration\Migrations\Version... 
```
