<?php

namespace Pratiksh\Laramin\Contracts;

use Pratiksh\Laramin\Models\Role;
use Pratiksh\Laramin\Http\Requests\RoleRequest;

interface RoleRepositoryInterface
{
    public function indexRole();

    public function createRole();

    public function storeRole(RoleRequest $request);

    public function showRole(Role $role);

    public function editRole(Role $role);

    public function updateRole(RoleRequest $request, Role $role);

    public function destroyRole(Role $role);
}
