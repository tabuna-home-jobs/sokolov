## SEO
SEO help package from Laravel

[![Latest Stable Version](https://poser.pugx.org/orchid/seo/v/stable)](https://packagist.org/packages/orchid/seo)
[![Total Downloads](https://poser.pugx.org/orchid/seo/downloads)](https://packagist.org/packages/orchid/seo)
[![License](https://poser.pugx.org/orchid/seo/license)](https://packagist.org/packages/orchid/seo)



## Installation

1. install package

	```php
    composer require orchid/seo
	```

1. edit config/app.php

	service provider :

	```php
	Orchid\SEO\Providers\SEOServiceProvider::class
	```

    class aliases :

	```php
	'SEO' => Orchid\SEO\Facades\SEOFacades::class
	```

1. create settings table

	```php
	php artisan vendor:publish
	php artisan migrate
	```

## Usage

```php

```
