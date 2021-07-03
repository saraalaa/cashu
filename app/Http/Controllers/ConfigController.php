<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfigRequest;
use App\Models\Config;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index()
    {
        $configs = Config::whereHas('user', function ($query) {
            $query->where('customer_id', auth()->user()->customer_id);
        })->latest()->paginate();
        return view('config.index', compact('configs'));
    }

    public function edit(Config $config)
    {
        abort_if($config->user->customer_id != auth()->user()->customer_id, '403');

        return view('config.edit', compact('config'));
    }

    public function update(Config $config, ConfigRequest $request): RedirectResponse
    {
        abort_if($config->user->customer_id != auth()->user()->customer_id, '403');

        $config->update($request->validated());
        return redirect()->route('configs.index')->with('success', 'Data Updated Successfully');
    }
}
