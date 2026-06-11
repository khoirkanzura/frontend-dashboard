<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    private function getDefaultProfile()
    {
        return [
            'name' => 'Charlene Reed',
            'username' => 'Charlene Reed',
            'email' => 'charlenereed@gmail.com',
            'password' => 'charlene123',
            'dob' => '1990-01-25',
            'present_address' => 'San Jose, California, USA',
            'permanent_address' => 'San Jose, California, USA',
            'city' => 'San Jose',
            'postal_code' => '45962',
            'country' => 'USA',
            'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=150&q=80'
        ];
    }

    private function getDefaultPreferences()
    {
        return [
            'currency' => 'USD',
            'timezone' => 'GMT-12:00 International Date Line West',
            'notif_digital' => true,
            'notif_merchant' => false,
            'notif_recommend' => true,
        ];
    }

    private function getDefaultSecurity()
    {
        return [
            'two_factor' => true,
        ];
    }

    public function index(Request $request)
    {
        $profile = array_merge($this->getDefaultProfile(), session('profile', []));
        $preferences = array_merge($this->getDefaultPreferences(), session('preferences', []));
        $security = array_merge($this->getDefaultSecurity(), session('security', []));
        $active_tab = session('active_tab', $request->input('tab', 'profile'));

        return view('settings', compact('profile', 'preferences', 'security', 'active_tab'));
    }

    public function update(Request $request)
    {
        $section = $request->input('section');

        if ($section === 'profile') {
            $data = $request->only([
                'name', 'username', 'email', 'password', 'dob',
                'present_address', 'permanent_address', 'city', 'postal_code', 'country'
            ]);
            
            $profile = array_merge($this->getDefaultProfile(), session('profile', []));
            $profile = array_merge($profile, $data);
            
            // Handle mock avatar upload
            if ($request->hasFile('avatar')) {
                // In a real app we'd save the file. For dummy, we use a mock profile picture
                $profile['avatar'] = 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=150&q=80';
            }

            session(['profile' => $profile]);
            session(['active_tab' => 'profile']);
            
            return redirect()->route('settings')->with('success', 'Profile updated successfully!');
        }

        if ($section === 'preferences') {
            $preferences = [
                'currency' => $request->input('currency', 'USD'),
                'timezone' => $request->input('timezone', 'GMT-12:00 International Date Line West'),
                'notif_digital' => $request->has('notif_digital'),
                'notif_merchant' => $request->has('notif_merchant'),
                'notif_recommend' => $request->has('notif_recommend'),
            ];

            session(['preferences' => $preferences]);
            session(['active_tab' => 'preferences']);

            return redirect()->route('settings')->with('success', 'Preferences updated successfully!');
        }

        if ($section === 'security') {
            $security = [
                'two_factor' => $request->has('two_factor'),
            ];

            // If changing password, validate fields
            if ($request->filled('current_password') || $request->filled('new_password')) {
                $request->validate([
                    'current_password' => 'required',
                    'new_password' => 'required|min:6'
                ]);

                // Update password in profile
                $profile = array_merge($this->getDefaultProfile(), session('profile', []));
                $profile['password'] = $request->input('new_password');
                session(['profile' => $profile]);
            }

            session(['security' => $security]);
            session(['active_tab' => 'security']);

            return redirect()->route('settings')->with('success', 'Security settings updated successfully!');
        }

        return redirect()->route('settings');
    }
}

