# Init

First of all, install the required dependencies with `composer install` and configure the autoloader so you can use Namespaces.

```php
require_once('../vendor/autoload.php');
```

Then, configure the ORM by requiring it and by initializing it with the connexion :

```php
use ORM\phpstORM;
use Symfony\Component\Yaml\Yaml;

$params = Yaml::parseFile('../config/parameters.yml');

$phpstORM = new phpstORM();

$config = $config = new \Doctrine\DBAL\Configuration();
$connectionParams = [
    'dbname' => $params['db']['name'],
    'user' => $params['db']['user'],
    'password' => $params['db']['password'],
    'host' => $params['db']['host'],
    'driver' => $params['db']['driver'],
    'charset' => $params['db']['charset'],
];
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

$phpstORM = new phpstORM();
$phpstORM->init($conn);
```
