<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamMemberRequest;
use App\Models\TeamMember;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index(): View
    {
        $teamMembers = TeamMember::orderBy('order_column')->paginate(15);

        return view('admin.team.index', compact('teamMembers'));
    }

    public function create(): View
    {
        return view('admin.team.create');
    }

    public function store(TeamMemberRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('team', 'public');
        }

        TeamMember::create($data);

        return redirect()->route('admin.team-members.index')->with('status', 'Anggota tim berhasil ditambahkan.');
    }

    public function edit(TeamMember $team_member): View
    {
        return view('admin.team.edit', ['teamMember' => $team_member]);
    }

    public function update(TeamMemberRequest $request, TeamMember $team_member): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            if ($team_member->photo) {
                Storage::disk('public')->delete($team_member->photo);
            }

            $data['photo'] = $request->file('photo')->store('team', 'public');
        }

        $team_member->update($data);

        return redirect()->route('admin.team-members.index')->with('status', 'Anggota tim berhasil diperbarui.');
    }

    public function destroy(TeamMember $team_member): RedirectResponse
    {
        if ($team_member->photo) {
            Storage::disk('public')->delete($team_member->photo);
        }

        $team_member->delete();

        return redirect()->route('admin.team-members.index')->with('status', 'Anggota tim berhasil dihapus.');
    }
}
