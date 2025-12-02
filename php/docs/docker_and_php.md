## Docker compose file example
The most important configuration is the volumes to have the php files on `/var/www/html`.

```yml
services:
  php:
    image: php:8.4.14-apache
    volumes:
      - './:/var/www/html' # Sync project dir with container web dir (php files folder)
    ports:
      - 8080:80
```

To manage the auto-load in need to setup a composer.json file:

```json
{
  "autoload": {
    "psr-4": {
      "App\\": "folder-files-path/"
    }
  },
  "require": {}
}
```

To complete the setup run the next commands:

```bash
# Global composer installation:
docker exec container-name sh -c "curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer"

# Exec composer install:
docker exec container-name composer install
```
