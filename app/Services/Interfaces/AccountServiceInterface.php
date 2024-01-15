<?php

namespace App\Services\Interfaces;

use Illuminate\Http\Request;

/**
 * Interface AccountServiceInterface
 * @package App\Services\Interfaces
 */
interface AccountServiceInterface
{
    // Server
    public function get_Account();

    public function get_AccountAdmin();
    public function get_AccountUser();
    public function search();
   
    public function create($request);
     public function edit($id);
     public function delete($id);
     public function update(Request $request);

     //Client
     public function register(Request $request);

     public function update_profile(Request $request);
}
