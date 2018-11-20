<?php

namespace App\Http\Controllers;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
interface CrudInterface
{
    public function create($data);

    public function read(int $id);

    public function update(int $id, array $data);

    public function delete(int $id);
}
