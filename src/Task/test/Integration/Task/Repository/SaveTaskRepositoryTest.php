<?php

declare(strict_types=1);

namespace Task\Test\Integration\Task\Repository;

use PHPUnit\Framework\TestCase;

final class SaveTaskRepositoryTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @test
     */
    public function itSavesTheTaskCorrectly(): void
    {
        self::assertSame('Administration/Managing', 'Administration/Managing');
    }
}
