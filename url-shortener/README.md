# URL Shortener TDD Challenge

## Overview
In this TDD challenge, you'll implement a URL shortening service that converts long URLs into unique short codes and allows retrieving the original URL using that code.

## Requirements

1. Create a service that shortens URLs into unique codes (6 characters long)
2. Allow retrieving the original URL using the shortened code
3. Handle error cases appropriately (invalid URLs, non-existent codes)
4. Implement proper validation for URLs (must be valid format, have protocol, etc.)

## Interface

The solution must implement the provided `UrlShortenerInterface` interface:

```php
interface UrlShortenerInterface 
{
    /**
     * Creates a shortened code from a long URL
     * @param string $url The URL to shorten
     * @return string The generated code (6 characters)
     * @throws InvalidUrlException If URL format is invalid
     */
    public function shorten(string $url): string;
    
    /**
     * Retrieves the original URL from a code
     * @param string $code The shortened code
     * @return string The original URL
     * @throws CodeNotFoundException If code doesn't exist
     */
    public function getUrl(string $code): string;
}
```

## Getting Started

1. Clone this repository
2. Run `composer install`
3. Run the tests with `composer test` (they should fail)
4. For active TDD, use `composer test:watch` which will automatically re-run tests when files change
5. Implement the `UrlShortener` class to make the tests pass

## TDD Process

1. Start with the simplest test (correct code length)
2. Move on to basic functionality (storing and retrieving URLs)
3. Add validation (check for valid URL formats)
4. Handle error cases (non-existent codes)
5. Ensure consistent behavior (same URL produces same code)
6. Test with various URL formats

## Running Tests

The repository includes several commands to make testing easier:

- `composer test` - Run all tests once
- `composer test:watch` - Automatically run tests when code changes (great for TDD)
- `composer test:coverage` - Generate code coverage report in the `/coverage` directory

## Tips

- Use an in-memory repository (array) for storage
- Consider using `filter_var($url, FILTER_VALIDATE_URL)` for basic URL validation
- For the 6-character code, you could use a hashing function like md5 and take the first 6 characters
- Focus on making each test pass before moving to the next one
- Don't worry about persistence or HTTP concerns, focus on the core logic
- Remember to follow the Red-Green-Refactor cycle: write a failing test, make it pass with the simplest code, then refactor