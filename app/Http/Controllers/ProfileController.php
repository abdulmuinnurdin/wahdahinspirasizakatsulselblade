<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Support\TraceId;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Header log: nama class pemicu, dipakai di setiap entry log.
     *
     * @var string
     */
    protected $headerLog = '[ProfileController] => ';

    /**
     * Channel log yang dipakai controller ini.
     *
     * @var string
     */
    protected $channelLog = 'frontend';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(): View
    {
        $traceId = TraceId::current();

        Log::channel($this->channelLog)->info(
            $this->headerLog.'EDIT => '.$traceId.' => edit : RUN',
            ['trace_id' => $traceId, 'user_id' => auth()->id()]
        );

        return view('profile.edit', [
            'user' => auth()->user(),
        ]);
    }

    public function update(UpdateProfileRequest $request): RedirectResponse
    {
        $traceId = TraceId::current();
        $user = auth()->user();
        $data = $request->validated();

        $passwordChanged = ! empty($data['password']);

        if (! $passwordChanged) {
            unset($data['password']);
        }

        $user->fill($data);
        $user->save();

        Log::channel($this->channelLog)->info(
            $this->headerLog.'UPDATE => '.$traceId.' => update : SUCCESS',
            ['trace_id' => $traceId, 'user_id' => $user->id, 'password_changed' => $passwordChanged]
        );

        if ($passwordChanged) {
            Log::channel('auth')->info(
                $this->headerLog.'UPDATE => '.$traceId.' => update : PASSWORD_CHANGED',
                ['trace_id' => $traceId, 'user_id' => $user->id]
            );
        }

        return redirect()->route('profile.edit')->with('status', 'Profil berhasil diperbarui.');
    }
}
