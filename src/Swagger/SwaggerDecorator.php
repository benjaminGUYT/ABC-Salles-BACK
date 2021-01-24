<?php
// api/src/Swagger/SwaggerDecorator.php

namespace App\Swagger;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;


final class SwaggerDecorator implements NormalizerInterface
{
    private $decorated;

    public function __construct(NormalizerInterface $decorated)
    {
        $this->decorated = $decorated;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $docs = $this->decorated->normalize($object, $format, $context);

        // Note : C'est normal que le nom du paramètre soit inclus dans le hint, ca fait partit des specs swagger 3.

        // Override title
        $docs['info']['title'] = 'Symfony API Platform - Memory game';
        unset($docs['paths']['/api/record/{id}']);
        unset($docs['paths']['/api/record']);

        return $docs;
    }

    public function supportsNormalization($data, $format = null)
    {
        return $this->decorated->supportsNormalization($data, $format);
    }
}

?>