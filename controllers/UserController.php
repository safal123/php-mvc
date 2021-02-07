<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Core\Request;
use App\models\Country;
use App\Models\Customer;

class UserController extends BaseController
{
    /**
     * @return string|string[]
     */
    public function index()
    {
        $users = Customer::all();
        return $this->render('home', compact("users"));
    }

    /**
     * @return string|string[]
     */
    public function create()
    {
        $countries = Country::all('countries');
        return $this->render('users', compact('countries'));
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->getBody()['name'],
            'mobile' => $request->getBody()['mobile'],
            'email' => $request->getBody()['email'],
            'country_id' => $request->getBody()['country'],
            'active' => $request->getBody()['active'],

        ];
        $customer = Customer::insert('customers', $data);
        return redirect('/');
    }
    
    protected function getCountry($id)
    {
        $country = "SELECT country FROM COUNTRIES where id = $id";
        $statement = $this->db()->prepare($country);
        if($statement->execute()){
            return $statement->fetchColumn();
        }
    }

}