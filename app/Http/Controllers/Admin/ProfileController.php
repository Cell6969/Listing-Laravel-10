<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ProfileController extends Controller
{
    use FileUploadTrait;

    public function index(): View
    {
        $user = Auth::user();
        return view('admin.profile.index', compact('user'));
    }

    public function store(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = Auth::user();
        $avatarPath = $this->uploadImage($request, 'avatar', $user->avatar, '/uploads/avatar');
        $bannerPath = $this->uploadImage($request, 'banner', $user->banner, '/uploads/banner');

        $user->avatar = !empty($avatarPath) ? $avatarPath : $user->avatar;
        $user->banner = !empty($bannerPath) ? $bannerPath : $user->banner;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->about = $request->input('about');
        $user->web_link = $request->input('web_link');
        $user->facebook_link = $request->input('facebook_link');
        $user->x_link = $request->input('x_link');
        $user->linkedin_link = $request->input('linkedin_link');
        $user->whatsapp_link = $request->input('whatsapp_link');
        $user->instagram_link = $request->input('instagram_link');
        $user->save();

        toastr()->success('Successfully update profile');

        return redirect()->back();
    }

    public function storePassword(Request $request): RedirectResponse
    {
        $request->validate([
            "password" => ["required", "confirmed", "min:5"]
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->input('password'));
        $user->save();

        toastr()->success('Successfully update password');

        return redirect()->back();
    }
}
