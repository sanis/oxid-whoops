# oxid-whoops
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/sanis/oxid-whoops/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/sanis/oxid-whoops/?branch=master)

Integration of the [whoops](https://github.com/filp/whoops/) error handler base/framework for PHP into the [OXID](http://www.oxid-esales.com) eShop.

-----

**whoops** is an error handler base/framework for PHP. Out-of-the-box, it provides a pretty
error interface that helps you debug your web projects, but at heart it's a simple yet
powerful stacked error handling system.

![Whoops!](http://i.imgur.com/0VQpe96.png)

## Installation

1. To your OXID composer.json (usualy in modules folder) add ```"filp/whoops": "^2.0"``` Or just run ```composer require filp/whoops``` to get it added automatically.
2. If you have added step 1 line to composer.json file by yourself run ```composer update``` from console to get dependencies updated.
3. Copy modules folder contents to your OXID installation modules folder.
4. Enable module via OXID admin.
5. Enjoy very nice exceptions!

Productive mode should be disabled to see error messages. Enable productive mode only on your production environment. Then you'll get shop offline message on exceptions without revealing code parts to the users.

## Authors

This whoops library was primarily developed by [Filipe Dobreira](https://github.com/filp), and is was originaly created by [Denis Sokolov](https://github.com/denis-sokolov). A lot of awesome fixes and enhancements were also sent in by [various contributors](https://github.com/filp/whoops/contributors).
The smx_whoops module for integrating whoops into OXID was developed by shoptimax GmbH, Gernot Payer and [Stefan Moises](https://github.com/smxsm). 

This is modified version of the module with some improvements made by [Justinas Bolys](https://github.com/sanis).
