<?php

namespace App\Model;

class Circle
{
    private float $radius;

    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    /**
     * Calculate the surface area of the circle.
     *
     * @return float
     */
    public function calculateSurface(): float
    {
        return pi() * pow($this->radius, 2);
    }

    /**
     * Calculate the diameter of the circle.
     *
     * @return float
     */
    public function calculateDiameter(): float
    {
        return $this->radius * 2;
    }
}
