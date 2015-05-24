# PHP LDAP Filter Library

This is a PHP library to create LDAP filters with a simple to use object oriented api. It is build for PHP 5.3+.

[![Build Status](https://travis-ci.org/jschaedl/LdapFilter.png)](https://travis-ci.org/jschaedl/LdapFilter) 
[![Latest Stable Version](https://poser.pugx.org/jschaedl/ldapfilter/v/stable)](https://packagist.org/packages/jschaedl/ldapfilter) 
[![Total Downloads](https://poser.pugx.org/jschaedl/ldapfilter/downloads)](https://packagist.org/packages/jschaedl/ldapfilter) 
[![Latest Unstable Version](https://poser.pugx.org/jschaedl/ldapfilter/v/unstable)](https://packagist.org/packages/jschaedl/ldapfilter) 
[![License](https://poser.pugx.org/jschaedl/ldapfilter/license)](https://packagist.org/packages/jschaedl/ldapfilter)
![PHP Version](https://img.shields.io/badge/version-PHP%205.3%2B-lightgrey.svg)


---

## API usage

### LDAP filters

Currently, the library supports to create the following LDAP filters:

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

[Jan Schädlich](https://github.com/jschaedl)


## License

MIT Public License
