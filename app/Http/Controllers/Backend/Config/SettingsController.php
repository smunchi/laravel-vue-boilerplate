<?php

namespace App\Http\Controllers\Backend\Config;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Repository\Config\SettingRespository;

class SettingsController extends Controller
{
    public $repository;

    public function __construct(SettingRespository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return view('backend.config.setting');
    }

    public function indexApi()
    {
        return response()->json($this->repository->getAll(), Response::HTTP_ACCEPTED);
    }

    public function update(Request $request)
    {
        $request->validate(['value' => 'required|max:190']);
        if ($setting = $this->repository->update($request->id, $request->except('form'))) {
            return response()->json([
                'message' => 'Settings update successfully',
                'data' => $setting
            ], Response::HTTP_ACCEPTED);
        }
        return response()->json(['error' => 'Something went wrong'], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
