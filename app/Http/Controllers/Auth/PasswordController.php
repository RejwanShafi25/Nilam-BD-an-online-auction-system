<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Log;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */

     public function updatePassword(Request $request)
     {
         $request->validate([
             'current_password' => ['required', 'string', 'min:8'],
             'password' => ['required', 'string', 'min:8', 'confirmed'],
         ]);
     
         // Check if current password matches the user's actual password
         if (!Hash::check($request->current_password, auth()->user()->password)) {
             return back()->withErrors(['current_password' => 'Current password is incorrect.']);
         }
     
         // Update the new password (hash it first)
         $user = auth()->user();
         $user->password = Hash::make($request->password);
         $user->save();
     
         return back()->with('status', 'Password updated successfully!');
     }

}