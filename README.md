# Statamic Adobe Fonts


![Statamic 4.0+](https://img.shields.io/badge/Statamic-4.0+-FF269E?style=for-the-badge&link=https://statamic.com)
[![Statamic Google Fonts on Packagist](https://img.shields.io/packagist/v/dulce/statamic-adobe-fonts?style=for-the-badge)](https://packagist.org/packages/dulce/statamic-adobe-fonts/stats)

Statamic Adobe Fonts is a Statamic addon that makes self-hosting Adobe Typekit Fonts as frictionless as possible for Statamic users. 

## Features

This addon provides:

- Self-hosting of Adobe Typekit Fonts on your own server.
- Ability to customize which Adobe Typekit Fonts are hosted.

## Installation

You can install this addon from the `Tools > Addons` section of the Statamic control panel by searching for "Adobe Fonts" and clicking **install**. Alternatively, you can run the following command from your project root:

```bash
composer require dulce/statamic-adobe-fonts
```
After the package is installed, you can publish the configuration file with:

```bash
php artisan vendor:publish --provider="Dulce\StatamicAdobeFonts\ServiceProvider"
```

This will create a `statamic-adobe-fonts.php` config file in your `config` directory.

## Configuration

To load fonts in your application, register an Adobe Typekit Fonts embed URL in the `statamic-adobe-fonts.php` config file:

```php
// config/adobe.typekit.php

return [
    'fonts' => [
        'default' => 'https://use.typekit.net/[project-id].css',
    ],
];
```
Replace `[project-id]` with your actual project ID from Adobe Typekit.

## Usage

Once the addon is installed, you can configure which Adobe Fonts you want to use by editing the `statamic-adobe-fonts.php` config file in your `config` directory.

In your Antlers templates, you can use the provided Antlers tag to include the necessary CSS for the Adobe Fonts:

```html
 {{ typekit }}
```

This tag will output the necessary CSS link to include the Adobe Fonts in your website.

To use an Adobe Font in your website, simply use the font's name in your CSS. For example:
```css
body {
    font-family: 'Adobe Caslon Pro', serif;
}
```

Please refer to the Adobe Fonts documentation for a complete list of available fonts and their corresponding CSS classes.
