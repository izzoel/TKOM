<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'nip' => 'required|string',
            'flatform' => 'required|string',
            'mode' => 'required|string',
            'lokasi_pre' => 'nullable|string',
            'photos' => 'nullable|image|max:2048'
        ]);

        $photoPath = null;

        if ($request->hasFile('photos')) {

            $photoPath = $request->file('photos')->store('photos', 'public');
        }
        Device::create([
            'nip' => $request->nip,
            'flatform' => $request->flatform,
            'mode' => $request->mode,
            'lokasi_pre' => $request->lokasi_pre,
            'photos' => $photoPath,
            'v_govem' => 'v_govem'
        ]);

        return response()->json([
            'success' => true,
            'data' => [
                'nip' => $request->nip,
                'flatform' => $request->flatform,
                'mode' => $request->mode,
                'lokasi_pre' => $request->lokasi_pre,
                'photos' => $photoPath,
                'v_govem' => 'v_govem'
            ]
        ]);
    }
}
