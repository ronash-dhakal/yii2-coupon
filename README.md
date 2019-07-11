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


Usage
-----

Once the extension is installed, add following code to config module  :

```php
<?= [
     'coupon' => [
            'class' => 'ronash\coupon\module',
        ],
] ?>```