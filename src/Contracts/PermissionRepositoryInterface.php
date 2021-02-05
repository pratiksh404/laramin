<?php

namespace Pratiksh\Laramin\Contracts;

use Pratiksh\Laramin\Models\Permission;
use Pratiksh\Laramin\Http\Requests\PermissionRequest;

interface PermissionRepositoryInterface
{
    public function indexPermission();

    public function createPermission();

    public function storePermission(PermissionRequest $request);

    public function showPermission(Permission $Permission);

    public function editPermission(Permission $Permission);

    public function updatePermission(PermissionRequest $request, Permission $Permission);

    public function destroyPermission(Permission $Permission);
}
