<?php

namespace App\Repositories;
use App\Models\Account;
use App\Repositories\Interfaces\AccountRepositoryInterface;

/**
 * Class AccountRepository
 * @package App\Services
 */
class AccountRepository implements AccountRepositoryInterface
{

   public function paginate(){

       return Account::paginate(100);
   }
}
