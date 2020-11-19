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

        //$docs['paths']['/api/ref-prenoms']['get']['parameters'][0]['description'] = 'test';

        //\print_r($docs['paths']['/api/ref-prenoms']['get']['parameters'][0]);

        //print_r($docs['paths']['/api/ref-prenoms']['get']['parameters'][0]['description']);

        foreach($docs['paths']['/api/ref-prenoms']['get']['parameters'] as &$param) {
            if($param['name'] == 'label') {
                $param['description'] = 'Format de la recherche : LIKE "%...%"';
            }
        }

        

        // Override title
        $docs['info']['title'] = 'Symfony API Platform - Anti-sèche';

        return $docs;
    }

    public function supportsNormalization($data, $format = null)
    {
        return $this->decorated->supportsNormalization($data, $format);
    }
}

?>