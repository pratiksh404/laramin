<?php

namespace Pratiksh\Laramin\Contracts;

use App\Models\Admin\Test;
use App\Http\Requests\TestRequest;

interface TestRepositoryInterface
{
    public function indexTest();

    public function createTest();

    public function storeTest(TestRequest $request);

    public function showTest(Test $Test);

    public function editTest(Test $Test);

    public function updateTest(TestRequest $request, Test $Test);

    public function destroyTest(Test $Test);
}
