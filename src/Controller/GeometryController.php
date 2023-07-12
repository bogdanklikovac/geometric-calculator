<?php

namespace App\Controller;

use App\Model\Circle;
use App\Model\Triangle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;

class GeometryController extends AbstractController
{
    private SerializerInterface $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    #[Route('/triangle/{a}/{b}/{c}', name: 'triangle', methods: ['GET'])]
    public function triangle(float $a, float $b, float $c): JsonResponse
    {
        $triangle = new Triangle($a, $b, $c);

        $response = [
            'type' => 'triangle',
            'a' => $a,
            'b' => $b,
            'c' => $c,
            'surface' => $triangle->calculateSurface(),
            'circumference' => $triangle->calculateCircumference(),
        ];

        $jsonResponse = $this->serializer->serialize($response, 'json');

        return new JsonResponse($jsonResponse, Response::HTTP_OK, ['Content-Type' => 'application/json'], true);
    }

    #[Route('/circle/{radius}', name: 'circle', methods: ['GET'])]
    public function circle(float $radius): JsonResponse
    {
        $circle = new Circle($radius);

        $response = [
            'type' => 'circle',
            'radius' => $radius,
            'surface' => $circle->calculateSurface(),
            'circumference' => $circle->calculateDiameter() * pi(),
        ];

        $jsonResponse = $this->serializer->serialize($response, 'json');

        return new JsonResponse($jsonResponse, Response::HTTP_OK, ['Content-Type' => 'application/json'], true);
    }
}
