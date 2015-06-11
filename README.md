# embed-resource-example

[embed-resource-support](https://github.com/ritalin/embed-resource-support) example for [BEAR.Sunday](https://github.com/bearsunday/BEAR.Sunday)

## Usage
    $ git clone https://github.com/ritalin/embed-resource-support.git {Vendor.Package}
    $ cd {Vendor.Package}
    $ cp composer.dist.json composer.json
    $ composer install

    // console
    $ php bootstrap/api.php get "/period?from=2&len=3"
    // built-in web
    $ php -S 127.0.0.1:8081 -t var/www/

## Requirements

 * PHP >= 5.5.x
