<?php

namespace App\Services;

use App\Services\Interfaces\AccountServiceInterface;
use App\Models\Account;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Services\BaseService;



/**
 * Class AccountService
 * @package App\Services
 */
class AccountService extends BaseService implements AccountServiceInterface
{

    protected Account $account;
    public function __construct(Account $account)
    {
        $this->account = $account;
    }

    /*---------------------------- Server--------------------------------*/

    public function get_Account()
    {
        return Account::paginate(100);
    }

    public function get_AccountAdmin()
    {
        return Account::where('function', '=', 1)->paginate(100);
    }

    public function get_AccountUser()
    {
        return Account::where('function', '=', 0)->paginate(100);
    }
    public function search()
    {
        return Account::query()
            ->where('fullname', 'like', '%' . request('search') . '%')
            ->orWhere('email', 'like', '%' . request('search') . '%')
            ->orWhere('phone', 'like', '%' . request('search') . '%')
            ->orWhere('address', 'like', '%' . request('search') . '%')
            ->paginate(100);
    }

    public function create($request)
    {
        DB::beginTransaction();
        try {

            $account = new Account();
            $account->avatar = $request->file('image')->getClientOriginalName();
            $account->fullname = $request->input('fullname');
            $account->sex = $request->input('gender');
            $account->phone = $request->input('phone');
            $account->address = $request->input('address');
            $account->created_at = Carbon::now()::createFromFormat('Y-m-d H:i:s', Carbon::now())->format('Y-m-d H:i:s');
            $account->updated_at = Carbon::now()::createFromFormat('Y-m-d H:i:s', Carbon::now())->format('Y-m-d H:i:s');
            $account->email = $request->input('email');
            $account->password = Hash::make($request->input('password1'));
            $account->function = $request->input('function');
            $request->file('image')->storeAs('Images', $account->avatar);
            $account->save();
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return false;
        }

    }
    public function edit($id)
    {
        $account = Account::find($id);
        return $account;
    }

    public function update($request)
    {
        $account = Account::find($request->id);

        $account->fullname = $request->input('fullname');
        $account->sex = $request->input('gender');
        $account->phone = $request->input('phone');
        $account->address = $request->input('address');
        $account->updated_at = Carbon::now()::createFromFormat('Y-m-d H:i:s', Carbon::now())->format('Y-m-d H:i:s');
        $account->email = $request->input('email');
        $account->function = $request->input('function');

        if ($request->file('image')) {
            $account->avatar = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('Images', $account->avatar, 'public');
        }

        return $account->save();
    }


    public function delete($id)
    {
        $account = Account::find($id);
        $account->delete();
        return true;
    }

    /*---------------------------- Client--------------------------------*/

    public function register($request)
    {
        DB::beginTransaction();
        $account = new Account();
        $account->avatar = 'default.jpg';
        $account->fullname = $request->input('fullname');
        $account->created_at = Carbon::now()::createFromFormat('Y-m-d H:i:s', Carbon::now())->format('Y-m-d H:i:s');
        $account->updated_at = Carbon::now()::createFromFormat('Y-m-d H:i:s', Carbon::now())->format('Y-m-d H:i:s');
        $account->email = $request->input('email2');
        $account->password = Hash::make($request->input('password2'));
        $account->save();  
        return DB::commit();
    }

    public function update_profile($request){
        $account = Account::find($request->id);
        $account->fullname = $request->input('fullname');
        $account->sex = $request->input('gender');
        $account->phone = $request->input('phone');
        $account->address = $request->input('address');
        $account->updated_at = Carbon::now()::createFromFormat('Y-m-d H:i:s', Carbon::now())->format('Y-m-d H:i:s');
        $account->email = $request->input('email');
        if($request->input('password2') != null){
            $account->password = Hash::make($request->input('password2'));
        }
        if ($request->file('image')) {
            $account->avatar = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('Images', $account->avatar, 'public');
        }
        return $account->save();
    }
}
