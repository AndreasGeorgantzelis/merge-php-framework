<?php

namespace app\src\Application;

final class Framework
{
    public MergeRouter $mergeRouter;

    public function __construct()
    {
        $this->mergeRouter = new MergeRouter();
    }

    public function run(): void
    {
        $this->mergeRouter->route();
    }
}
