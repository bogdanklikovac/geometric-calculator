<?php

namespace App\Tests\Unit;

use App\Controller\GeometryController;
use App\Model\Circle;
use App\Model\Triangle;
use App\Service\GeometryCalculator;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class GeometryTest extends TestCase
{
    public function testCircleAction(): void
    {
        $radius = 2.0;

        $circle = new Circle($radius);

        $serializer = $this->getMockBuilder(SerializerInterface::class)
            ->getMock();
        $serializer->expects($this->once())
            ->method('serialize')
            ->with([
                'type' => 'circle',
                'radius' => $radius,
                'surface' => $circle->calculateSurface(),
                'circumference' => $circle->calculateDiameter() * pi(),
            ], 'json');

        $controller = new GeometryController($serializer);
        $response = $controller->circle($radius);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('application/json', $response->headers->get('Content-Type'));
    }

    public function testTriangleAction(): void
    {
        $a = 3.0;
        $b = 4.0;
        $c = 5.0;

        $triangle = new Triangle($a, $b, $c);

        $serializer = $this->getMockBuilder(SerializerInterface::class)
            ->getMock();
        $serializer->expects($this->once())
            ->method('serialize')
            ->with([
                'type' => 'triangle',
                'a' => $a,
                'b' => $b,
                'c' => $c,
                'surface' => $triangle->calculateSurface(),
                'circumference' => $triangle->calculateCircumference(),
            ], 'json');

        $controller = new GeometryController($serializer);
        $response = $controller->triangle($a, $b, $c);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('application/json', $response->headers->get('Content-Type'));
    }

    public function testSumAreas(): void
    {
        $circle = new Circle(2);
        $triangle = new Triangle(3, 4, 5);

        $geometryCalculator = new GeometryCalculator();
        $sumAreas = $geometryCalculator->sumAreas($circle, $triangle);

        $this->assertEquals(18.566370614359172, $sumAreas);
    }

    public function testSumCircumference(): void
    {
        $circle = new Circle(2);
        $triangle = new Triangle(3, 4, 5);

        $geometryCalculator = new GeometryCalculator();
        $sumCircumference = $geometryCalculator->sumCircumference($circle, $triangle);

        $this->assertEquals(24.566370614359172, $sumCircumference);
    }
}
