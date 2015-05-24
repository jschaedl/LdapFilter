# PHP LDAP Filter Library

This is a PHP library to create LDAP filters with a simple to use object oriented api.

---

## API usage

### LDAP filters

Currently, the library supports to cretae the following LDAP filters:

| Criterias   | Description       | Filter example |
|:-----------:|:-----------------:|:--------------|
| `=`         | *equals to*       | `(firstname = John)` |
| `~`         | *differs from*    | `(name ~ Smith)` |
| `>`         | *more than*       | `(height > 1.6)` |
| `>=`        | *more or equals*  | `(height >= 1.6)` |
| `<`         | *less than*       | `(age < 20)` |
| `<=`        | *less or equals*  | `(age <= 20)` |

| Operator    | Description       | Filter example |
| `!`         | *not*             | `!(age<10)` |
| `&`         | *and*             | `&(name=Doe)(firstname=John)` |
| `PIPE`      | *or*              | `PIPE(age<10)(male=true)` |
| *wildcards* | *matches all*     |	`&(firstname=J*)(name=Do?)` |
| *types*     | *conforms to*     | `(objectClass=Person)` |

### Example

```php
 
	// to be done
 
 ```	

### Unit Testing

This repository uses PHPUnit and Composer. For running Unit Tests you have to run `composer install` to install this package's dependencies. After that you can run the test via:

```
phpunit -c tests/phpunit.xml tests/
```
   
## Author

[Jan SchŠdlich](https://github.com/jschaedl)


## License

MIT Public License
