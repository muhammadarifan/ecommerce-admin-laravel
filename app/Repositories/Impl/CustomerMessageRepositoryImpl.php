<?php

namespace App\Repositories\Impl;

use App\Models\CustomerMessage;
use App\Repositories\CustomerMessageRepository;

class CustomerMessageRepositoryImpl implements CustomerMessageRepository
{
    public function getAll()
    {
        return CustomerMessage::all();
    }

    public function getById($id)
    {
        return CustomerMessage::find($id);
    }

    public function create($data)
    {
        return CustomerMessage::create($data);
    }

    public function update($id, $data)
    {
        $customerMessage = CustomerMessage::find($id);
        $customerMessage->update($data);
        return $customerMessage;
    }

    public function delete($id)
    {
        $customerMessage = CustomerMessage::find($id);
        $customerMessage->delete();
        return $customerMessage;
    }
}
