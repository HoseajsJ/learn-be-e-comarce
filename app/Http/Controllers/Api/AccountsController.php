<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountsController
{
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:accounts,user_id',
            'password' => 'required|string|min:8|confirmed',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ], 422);
        }
        $account = Account::where('user_id', $request->user_id)->first();
        $user = User::find($account->user_id);
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json([
            'status' => true,
            'message' => 'Password updated successfully',
        ]);
    }
}
