<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function edit(): View
    {
        return view('admin.settings.edit', [
            'settings' => Setting::map(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'whatsapp' => ['required', 'string', 'max:30'],
            'phone_display' => ['required', 'string', 'max:40'],
            'email' => ['required', 'email', 'max:180'],
            'instagram' => ['required', 'url', 'max:255'],
            'facebook' => ['required', 'url', 'max:255'],
        ]);

        $data['whatsapp'] = preg_replace('/\D+/', '', $data['whatsapp']);

        Setting::putMany($data);

        return back()->with('status', 'Configuracoes atualizadas com sucesso.');
    }
}
