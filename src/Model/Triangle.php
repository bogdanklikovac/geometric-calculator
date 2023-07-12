<?php

namespace App\Model;

class Triangle
{
    private float $a;
    private float $b;
    private float $c;

    public function __construct(float $a, float $b, float $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    /**
     * Calculate the surface area of the triangle.
     *
     * @return float
     */
    public function calculateSurface(): float
    {
        $s = ($this->a + $this->b + $this->c) / 2;
        return sqrt($s * ($s - $this->a) * ($s - $this->b) * ($s - $this->c));
    }

    /**
     * Calculate the circumference of the triangle.
     *
     * @return float
     */
    public function calculateCircumference(): float
    {
        return $this->a + $this->b + $this->c;
    }
}
