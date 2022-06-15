<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\CustomerMessageRepository;
use Illuminate\Http\Request;

class CustomerMessageController extends Controller
{
    public function __construct(CustomerMessageRepository $customerMessageRepository)
    {
        $this->customerMessageRepository = $customerMessageRepository;
    }

    public function index()
    {
        $customerMessages = $this->customerMessageRepository->getAll();

        return view('customer-message.index', compact('customerMessages'));
    }

    public function delete(Request $request)
    {
        $this->customerMessageRepository->delete($request->id);

        return redirect()->route('customer-message');
    }
}
