<?php

declare(strict_types=1);

namespace Tests;

use App\PasswordValidator;
use App\PasswordValidatorInterface;
use App\ValidationResult;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\PasswordValidator
 */
class PasswordValidatorTest extends TestCase
{
    private PasswordValidatorInterface $validator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->validator = new PasswordValidator();
    }

    public function testMinimumLengthValidation(): void
    {
        $expected = new ValidationResult(
            isValid: false,
            errors: ['password.length' => 'Password must be at least 8 characters long']
        );
        $result = $this->validator->validate('Ab1!');
        $this->assertEquals($expected, $result);
    }

    public function testUppercaseLetterValidation(): void
    {
        $expected = new ValidationResult(
            isValid: false,
            errors: ['password.uppercase' => 'Password must contain at least one uppercase letter']
        );

        $result = $this->validator->validate('ab1!ab1!ab1!');
        $this->assertEquals($expected, $result);
    }

    public function testLowercaseLetterValidation(): void
    {
        $expected = new ValidationResult(
            isValid: false,
            errors: ['password.lowercase' => 'Password must contain at least one lowercase letter']
        );

        $result = $this->validator->validate('A21!21!21!');
        $this->assertEquals($expected, $result);
    }

    public function testDigitValidation(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testSpecialCharacterValidation(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testMultipleValidationErrors(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testValidPassword(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testIsValidMethod(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    /**
     * @dataProvider passwordProvider
     */
    public function testVariousPasswordScenarios(string $password, bool $shouldBeValid, array $expectedErrors): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function passwordProvider(): array
    {
        return [
            'Valid password' => [
                'SecureP@ss123',
                true,
                []
            ],
            'Too short' => [
                'Ab1!',
                false,
                ['Password must be at least 8 characters long']
            ],
            'No uppercase' => [
                'securep@ss123',
                false,
                ['Password must contain at least one uppercase letter']
            ],
            'No lowercase' => [
                'SECUREP@SS123',
                false,
                ['Password must contain at least one lowercase letter']
            ],
            'No digit' => [
                'SecureP@ssword',
                false,
                ['Password must contain at least one digit']
            ],
            'No special character' => [
                'SecurePass123',
                false,
                ['Password must contain at least one special character']
            ],
            'Multiple issues' => [
                'nouppercaseorspecial123',
                false,
                [
                    'Password must contain at least one uppercase letter',
                    'Password must contain at least one special character'
                ]
            ],
        ];
    }
}