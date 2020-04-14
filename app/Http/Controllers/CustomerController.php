<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Repositories\CustomerRepositoryInterface;

class CustomerController extends Controller
{
	private $model;
	private $customerRepository;

	public function __construct(CustomerRepositoryInterface $customerRepository)
	{
		$this->model = new Customer;
		$this->customerRepository = $customerRepository;
	}

    public function getAll()
    {
		$customers = $this->customerRepository->all();

    	return response()->json([$customers]);
    }

    public function getById($customerId)
    {
    	$customer = $this->customerRepository->findById($customerId);

    	return response()->json([$customer]);
	}

    public function getUpdate($customerId)
    {
    	$customer = $this->customerRepository->update($customerId);

    	return redirect("/customer/".$customerId);
    }

    public function getDelete($customerId)
    {
    	$customer = $this->customerRepository->delete($customerId);
    	
    	return redirect('/');
    }
}
