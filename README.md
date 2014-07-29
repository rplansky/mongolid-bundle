![MongoLid](https://dl.dropboxusercontent.com/u/12506137/libs_bundles/mongolid_banner.png)

# MongoLid Bundle for Symfony

MongoLid is an easy, powerful and ultrafast MongoDB ODM. You can see more information in the [MongoLid Laravel Package](https://github.com/leroy-merlin-br/mongolid-laravel)

## Connecting with MongoDB

By default, MongolidBundle will try to connect using the default MongoDB connection parameters. It will try to connect to 'localhost' using the '27017' port.

Issues [#1](https://github.com/rplansky/mongolid-symfony/issues/1) and [#2](https://github.com/rplansky/mongolid-symfony/issues/2) were created to make this connection dynamic.

## Basic Usage

Creating a collection in three little steps:
* Extends ```Plansky\MongoligBundle\Document\BaseDocument``` class;
* Set a instance variable called ```$collection``` with your collection's name.
* Set a instance variable called ```$database``` with your mongo database name.
    
######Example:
```php+html
<?php 
namespace Acme\DemoBundle\Document;

use Plansky\MongolidBundle\Document\BaseDocument;

class Product extends BaseDocument
{
    /**
     * Collection's name
     * @var string
     */
     protected $collection = 'products';
    
    /**
     * Database's name
     * @var string
     */
     protected database = 'mongolid';
}
```

### Magics setters and getters
You don't need to define your collection's attributes and mark them with an annotation, a configuration file, schemas or something like that, just set your attributes directly and save it. 

```php
...
    $product->_id = 'mongolid';
    $product->name = 'MongolibBundle';
    $product->description = 'MongoLid is an easy, powerful and ultrafast MongoDB ODM.';
    $product->save();
...
```

## License
MIT

## Resources
* [Mongolid](https://github.com/leroy-merlin-br/mongolid)
* [Mongolid Laravel Package](https://github.com/leroy-merlin-br/mongolid-laravel) (with detailed documentation): 
