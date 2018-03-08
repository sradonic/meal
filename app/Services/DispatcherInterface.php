<?php

namespace App\Services;

interface DispatcherInterface
{
    public function filter($request);
}