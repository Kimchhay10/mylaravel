<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Repositories\CompanyRepository;
class ContactController extends Controller
{
    //Index
    public function index( CompanyRepository $company ){
        $contacts = Contact::where(function ($query) {
        if ($companyId = request()->query("company_id")) {
            $query->where("company_id", $companyId);
        }
        })->where(function ($query) {
        if ($search = request()->query('search')) {
            $query->where("first_name", "LIKE", "%{$search}%");
            $query->orWhere("last_name", "LIKE", "%{$search}%");
            $query->orWhere("email", "LIKE", "%{$search}%");
        }
        })->paginate(10);
        $companies = $company -> company_data();
        return view('contacts.index',['contacts'=>$contacts,'companies' => $companies]);
    }


    //Create
    public function create(){
        return view('contacts.create');
    }

    //Show
    // public function show($id){
    //     $contacts = $this -> getContacts();
    //     abort_if(!isset($contacts[$id]),404);
    //     $contact = $contacts[$id];
    //     return view('contacts.show')->with('contact',$contact);
    // }

    protected function getContacts(){
        return [
            1 => ['firstname' => 'Sok', 'lastname' => 'Dara', 'email'=>'dara@abc.com','phone'=>'092 293 234','address'=>'Phnom Penh', 'company'=>'ABC'],
            2 => ['firstname' => 'Sok', 'lastname' => 'Pisey', 'email'=>'pisey@abc.com','phone'=>'092 234 123','address'=>'Phnom Penh', 'company'=>'ABC'],
            3 => ['firstname' => 'Chan', 'lastname' => 'Ratha', 'email'=>'ratha@xyz.com','phone'=>'092 234 233','address'=>'Phnom Penh', 'company'=>'XYZ'],
            4 => ['firstname' => 'Kos', 'lastname' => 'Borey', 'email'=>'borey@mno.com','phone'=>'092 234 343','address'=>'Phnom Penh', 'company'=>'MNO'],
        ];
    }
    protected function getCompanies(){
        return [
            1 => ['name' => 'Company 1'],
            2 => ['name' => 'Company 2'],
        ];
    }
    public function show($id)
    {
        $contacts = $this->getContacts();
        abort_if(!isset($contacts[$id]), 404);
        $contact = Contact::findOrFail($id);
        return view('contacts.show')->with('contact', $contact);
    }
    
}