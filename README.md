Coupon Exention
===============
Discount Coupon Yii2

****
In Active Development.  

+++
TODO
+++
1) DB Migration
2) Products Model Mapping

****

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist ronash-dhakal/yii2-coupon "*"
```

or add

```
"ronash-dhakal/yii2-coupon": "*"
```

to the require section of your `composer.json` file.

Database
------
```
CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `expire_on` date NOT NULL,
  `current_use` int(11) NOT NULL DEFAULT '0',
  `total_use` int(11) NOT NULL DEFAULT '0',
  `description` varchar(255) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `public` tinyint(4) NOT NULL DEFAULT '1',
  `has_condition` tinyint(4) NOT NULL DEFAULT '0',
  `filter_by` varchar(50) DEFAULT NULL,
  `min_price` double DEFAULT NULL,
  `max_price` double DEFAULT NULL,
  `discount` float NOT NULL,
  `products` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

Usage
-----

Once the extension is installed, add following code to config module  :

```php
<?= [
     'coupon' => [
            'class' => 'ronash\coupon\module',
        ],
] ?>```