![MongoLid](https://dl.dropboxusercontent.com/u/12506137/libs_bundles/mongolid_banner.png)

# MongoLid Bundle for Symfony

MongoLid is an easy, powerful and ultrafast MongoDB ODM. You can see more information in the [MongoLid Laravel Package](https://github.com/leroy-merlin-br/mongolid-laravel)

## Getting Started

### Installation
Add `"plansky/mongolid-bundle": "dev-master"` to "require" key in `composer.json`

```yml
"require": {
    ...
    "plansky/mongolid-bundle": "dev-master"
}
```

Run `composer update plansky/mongolid-bundle`

### Bundle Registration
Register **MongolidBundle** in `AppKernel` class

```php
$bundles = array(
    ...
    new Plansky\MongolidBundle\MongolidBundle(),
);
```

### Configure MongoDB Connection
Edit `app/config.yml` file adding the MongoDB connection

```yml
mongolid:
    connections:
        default:
            hostname: 'localhost'
            port: 27017
            username: null
            password: null
            database: 'mongolid'
```

### Extends BaseDocument

To start using MongoLid just extends `Plansky\MongolidBundle\Document\BaseDocument`

```php
class MyDocument extends Plansky\MongolidBundle\Document\BaseDocument
{
    /**
     * Collection's that will be used do store my document
     * @var string
     */
    $connection = 'my_collection';
}
```

**Enjoy =)**

## License
MIT

## Resources
* [Mongolid](https://github.com/leroy-merlin-br/mongolid)
* [Mongolid Laravel Package](https://github.com/leroy-merlin-br/mongolid-laravel) (with detailed documentation): 
