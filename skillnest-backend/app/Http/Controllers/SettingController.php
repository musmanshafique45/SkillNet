<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();

        // Cast boolean values correctly for frontend
        $booleanKeys = ['allow_registration', 'require_approval', 'maintenance_mode'];
        foreach ($booleanKeys as $key) {
            if (isset($settings[$key])) {
                $settings[$key] = filter_var($settings[$key], FILTER_VALIDATE_BOOLEAN);
            }
        }

        return response()->json($settings);
    }

    public function update(Request $request)
    {
        // Admin only check is best done in middleware, but let's check here too
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $data = $request->all();
        foreach ($data as $key => $value) {
            // Store booleans as strings or keep consistent
            $valStr = is_bool($value) ? ($value ? 'true' : 'false') : $value;
            Setting::updateOrCreate(['key' => $key], ['value' => $valStr]);
        }

        return $this->index();
    }
}
