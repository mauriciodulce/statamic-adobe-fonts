<?php

namespace Dulce\StatamicAdobeFonts\Tags;

use Statamic\Tags\Tags;
use Dulce\StatamicAdobeFonts\Services\AdobeTypekit;

class TypekitTag extends Tags
{
    protected static $handle = 'typekit';

    public function index()
    {
        // obtener el parámetro de la fuente, o establecerlo en "default"
        $font = $this->params->get('font', 'default');

        // cargar la fuente
        return $this->_load($font);
    }

    protected function _load($font = 'default')
    {
        $loaded = app(AdobeTypekit::class)->load($font)->toHtml();

        return $loaded;
    }

    public function wildcard($font)
    {
        // cargar la fuente con el parámetro solicitado
        return $this->_load($font);
    }
}
