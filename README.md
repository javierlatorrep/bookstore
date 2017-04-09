bookstore
=========

Project Setup:

1) Configure `parameters.yml`:

2) [Download Composer](https://getcomposer.org/)

3) Install the vendor libraries.

```
php composer.phar install
```

4) Create your database and load some fixtures.

```
./bin/console doctrine:database:create
./bin/console doctrine:schema:update --force
./bin/console doctrine:fixtures:load
```

5) Start the web server:

```
./bin/console server:run
```

6) Go to `http://localhost:8000`!

To access Admin section watch '@UserBundle/DataFixtures/ORM/fixtures.yml'
