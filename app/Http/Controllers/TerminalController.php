<?php

namespace App\Http\Controllers;

use App\Http\Requests\TerminalUpdateRequest;
use App\Models\Terminal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Response;

class TerminalController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Terminal $terminal): Response
    {
        return inertia('Terminal/Edit', [
            'terminal' => $terminal,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TerminalUpdateRequest $request, Terminal $terminal): RedirectResponse
    {
        Gate::authorize('update', $terminal);

        $terminal->fill($request->safe()->except('provision_user_password'));

        // Parola boş bırakılabilir yapıldı. Hash işlemi Model Cast içinde uygulandı.
        if ($request->filled('password')) {
            $terminal->provision_user_password = $request->provision_user_password;
        }

        $terminal->save();

        return back()->with([
            'terminal' => $terminal,
        ]);
    }
}
