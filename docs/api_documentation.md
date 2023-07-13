## Architecture

The main components of the architecture are:

- **Model**: The application defines two model classes, `Circle` and `Triangle`, which encapsulate the data and logic related to these geometric shapes. The `Circle` class provides methods to calculate the surface area and diameter of a circle, while the `Triangle` class calculates the surface area and circumference of a triangle.

- **Controller**: The application's controller, `GeometryController`, is responsible for handling incoming HTTP requests and generating appropriate JSON responses. It utilizes the model classes and a serializer to calculate the geometric properties and serialize the response data.

- **Service**: The application includes a `GeometryCalculator` service that provides additional calculations on geometric objects. 

## API Endpoints

The API exposes two endpoints to calculate the properties of geometric shapes:

1. **Triangle Endpoint**
    - URL: `/triangle/{a}/{b}/{c}`
    - Method: `GET`
    - Parameters:
        - `a`, `b`, `c`: Float values representing the sides of the triangle.
    - Response:
        - JSON response containing the following properties:
            - `type`: The shape type ("triangle").
            - `a`, `b`, `c`: The side lengths of the triangle.
            - `surface`: The surface area of the triangle.
            - `circumference`: The circumference of the triangle.

2. **Circle Endpoint**
    - URL: `/circle/{radius}`
    - Method: `GET`
    - Parameters:
        - `radius`: Float value representing the radius of the circle.
    - Response:
        - JSON response containing the following properties:
            - `type`: The shape type ("circle").
            - `radius`: The radius of the circle.
            - `surface`: The surface area of the circle.
            - `circumference`: The circumference of the circle.
 
## Unit Testing

The test suite includes the following test cases:

- `testCircleAction()`: Tests the `circle()` action in the `GeometryController` to ensure that the correct JSON response is generated for a circle calculation.

- `testTriangleAction()`: Tests the `triangle()` action in the `GeometryController` to ensure that the correct JSON response is generated for a triangle calculation.

- `testSumAreas()`: Tests the `sumAreas()` method in the `GeometryCalculator` service to ensure that the sum of surface areas is calculated correctly.

- `testSumCircumference()`: Tests the `sumCircumference()` method in the `GeometryCalculator` service to ensure that the sum of circumferences is calculated correctly.

