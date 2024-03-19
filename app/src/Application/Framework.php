<?php

namespace app\src\Application;

final class Framework
{
    public MergeRouter $mergeRouter;

    public function __construct()
    {
        $this->mergeRouter = new MergeRouter();
    }

    public function router(): void
    {
        $this->mergeRouter->route();
    }
}
