<?php

namespace App\Service;

use App\Model\Circle;
use App\Model\Triangle;

class GeometryCalculator
{
    /**
     * Calculate the sum of areas for a Circle and Triangle.
     *
     * @param Circle   $circle   The Circle object.
     * @param Triangle $triangle The Triangle object.
     *
     * @return float The sum of areas.
     */
    public function sumAreas(Circle $circle, Triangle $triangle): float
    {
        return $circle->calculateSurface() + $triangle->calculateSurface();
    }

    /**
     * Calculate the sum of circumferences for a Circle and Triangle.
     *
     * @param Circle   $circle   The Circle object.
     * @param Triangle $triangle The Triangle object.
     *
     * @return float The sum of circumferences.
     */
    public function sumCircumference(Circle $circle, Triangle $triangle): float
    {
        return $circle->calculateDiameter() * pi() + $triangle->calculateCircumference();
    }
}
