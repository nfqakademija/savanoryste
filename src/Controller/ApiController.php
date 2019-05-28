<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Class ApiController
 * @package App\Controller
 */
class ApiController extends AbstractController
{
    /**
     * @return Serializer
     */
    private static function getSerializer() :Serializer
    {
        $encoder = new JsonEncoder();
        $defaultContext = [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return $object->getId();
            },
        ];
        $normalizer = new ObjectNormalizer(null, null, null, null, null, null, $defaultContext);

        $serializer = new Serializer([$normalizer], [$encoder]);
        return $serializer;
    }


    /**
     * @param array $toSerialize
     * @return JsonResponse
     */
    public static function jsonResponse($toSerialize) :JsonResponse
    {
        $serialized = self::getSerializer()->serialize($toSerialize, 'json');

        return self::response(
            $serialized
        );
    }

    /**
     * @param array $data
     * @param int $code
     * @param array|null $headers
     * @return JsonResponse
     */
    private static function response(string $data, int $code = 200, array $headers = []) : JsonResponse
    {
        if ($headers === []) {
            $headers = self::defaultHeader();
        }

        return JsonResponse::fromJsonString(
            $data,
            $code,
            $headers
        );
    }

    /**
     * @return array
     */
    private static function defaultHeader() :array
    {
        return [
            'content-type' => 'application/json',
            'Access-Control-Allow-Origin'   => '*'
        ];
    }
}
