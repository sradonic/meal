<?php

namespace App\Services;

interface MealInterface
{
    public function index($request, $locale);
    public function create($request);
    public function update($request, $id);
    public function delete($id);
}