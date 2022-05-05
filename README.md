you can use this command to run project:
```bash
php -S localhost:1234 -t public
```

to run queue, use : 
```bash
php artisan worker
```

you should config the db in .env and rabbit in `config/amqp`, i provided two config ways.


