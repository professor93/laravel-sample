<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Country;
use App\User;
use Illuminate\Http\Request;

/*
 * Task - 1
 * */

class MainController extends Controller
{
    /**
     * Retrieve All Countries list
     * @return Country[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllCountries()
    {
        $countries = Country::all();

        return $countries;
    }

    /**
     * Retrieve All Companies by Country id
     * In this method Country will inject via route
     * @param Country $country
     * @return Company[]
     */
    public function getCompaniesByCountry(Country $country)
    {
        $companies = $country->companies;

        return $companies;
    }

    /**
     * Retrieve All Companies by Country name
     * In this method Country find via input (GET or POST)
     * @param Request $request
     * @return Company[]
     */
    public function getCompaniesByCountryName(Request $request)
    {
        $countryName = $request->input('country_name');
        $country = Country::whereName($countryName)->firstOrFail();
        $companies = $country->companies;

        return $companies;
    }

    /**
     * Retrieve All Companies' list with Users by Country id
     * In this method get companies' list via Eager loading
     * @param Country $country
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getCompaniesWithUsersByCountry(Country $country)
    {
        $companies = $country->companies()->with('users')->get();

        return $companies;
    }

    /**
     * Retrieve All Users of Company
     * @param Company $company
     * @return User[]
     */
    public function getUsersByCompany(Company $company)
    {
        $users = $company->users;

        return $users;
    }


    /**
     * Retrieve All Users' list with Companies by User id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getUsersWithCompanies()
    {
        $users = User::with('companies')->get();

        return $users;
    }


    /**
     * Retrieve All Companies of User
     * @param User $user
     * @return Company
     */
    public function getCompaniesByUser(User $user)
    {
        $companies = $user->companies;

        return $companies;
    }
}
