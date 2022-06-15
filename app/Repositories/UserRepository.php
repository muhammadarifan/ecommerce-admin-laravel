<?php

namespace App\Repositories;

interface UserRepository {
    public function getAll();
    public function getById($id);
    public function create($data);
    public function update($id, $data);
    public function delete($id);
}
