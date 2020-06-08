# Imoisey\Envbuilder

Envbuilder is an easy library for building .env files.

## Installation

```bash
composer require imoisey/envbuilder
```

## Usage

```php
use Imoisey\Envbuilder\EnvBuilder;

$envBuilder = new EnvBuilder();

$envBuilder->add('APP_PORT', '5001');

$envBuilder
    ->add('DB_NAME', 'dbname')
    ->add('DB_USER', 'dbuser')
    ->add('DB_PASS', 'dbpass');

$envBuilder->build('.env');
```                      

.env:

```dotenv
APP_PORT: 5001
DB_NAME: dbname
DB_USER: dbuser
DB_PASS: dbpass
```


## License
[MIT](https://choosealicense.com/licenses/mit/)