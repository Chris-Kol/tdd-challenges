<?php

declare(strict_types=1);

namespace App;

interface DateProviderInterface
{
    /**
     * Get the current date
     * @return \DateTimeInterface
     */
    public function getCurrentDate(): \DateTimeInterface;
}