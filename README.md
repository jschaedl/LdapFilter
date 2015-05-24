# PHP LDAP Filter Library

This is a PHP library to create LDAP filters with a simple to use object oriented api. It is build for PHP 5.3+.

[![Build Status](https://travis-ci.org/jschaedl/php-ldapfilter.svg?branch=master)](https://travis-ci.org/jschaedl/php-ldapfilter)
![PHP Version](https://img.shields.io/badge/version-PHP%205.3%2B-lightgrey.svg)


---

## API usage

### LDAP filters

Currently, the library supports to create the following LDAP filters:

| Criterias   | Description       | Filter example |
|:-----------:|:-----------------:|:--------------|
| `=`         | *equals to*       | `(firstname = Jan)` |
| `~`         | *differs from*    | `(lastname ~ Schaedlich)` |
| `>`         | *more than*       | `(height > 1.6)` |
| `>=`        | *more or equals*  | `(height >= 1.6)` |
| `<`         | *less than*       | `(age < 20)` |
| `<=`        | *less or equals*  | `(age <= 20)` |


| Operator    | Description       | Filter example |
|:-----------:|:-----------------:|:--------------|
| `!`         | *not*             | `!(age<10)` |
| `&`         | *and*             | `&(name=Schaedlich)(firstname=Jan)` |
| `PIPE`      | *or*              | `PIPE(age<10)(male=true)` |
| *wildcards* | *matches all*     |	`&(firstname=J*)(name=Sch?)` |
| *types*     | *conforms to*     | `(objectClass=Person)` |

### Example

...	

### Unit Testing

This repository uses PHPUnit and Composer. For running Unit Tests you have to run `composer install` to install this package's dependencies. After that you can run the test via:

```
phpunit -c tests/phpunit.xml tests/
```
   
## Author

[Jan Schädlich](https://github.com/jschaedl)


## License

MIT Public License
