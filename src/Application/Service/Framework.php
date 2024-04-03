<?php
declare(strict_types=1);

namespace app\Application\Service;

final class Framework
{
    public MergeRouter $mergeRouter;

    public function __construct()
    {
        $this->mergeRouter = new MergeRouter();
    }

    public function run(): void
    {
        $this->mergeRouter->mapRoutes();
        $this->mergeRouter->resolve();
    }
}
