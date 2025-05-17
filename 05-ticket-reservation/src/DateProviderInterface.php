<?php

declare(strict_types=1);

namespace App;

interface DateProviderInterface
{
    /**
     * Get the current date/time
     * @return \DateTimeInterface
     */
    public function getCurrentDateTime(): \DateTimeInterface;
}
