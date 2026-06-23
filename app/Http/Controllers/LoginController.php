<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class LoginController extends Controller
{
    public function login()
    {
        $projects = Project::all();
        return view('welcome', compact('projects'));
    }

    public function showlogin($id)
    {
        $project = Project::findOrFail($id);
        
        // If already authenticated in session, skip login
        if (session('auth_project_' . $id)) {
            return redirect()->route('project.show', ['id' => $id]);
        }

        return view('login', compact('id', 'project'));
    }

    public function ProjectLogin(Request $request, $id)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $project = Project::where('id', $id)->where('password', $request->password)->first();

        if ($project) {
            // Store auth state in session to prevent form resubmission on reload
            session(['auth_project_' . $id => true]);
            return redirect()->route('project.show', ['id' => $id]);
        } else {
            return back()->with('error', 'Password yang Anda masukkan salah.');
        }
    }

    public function showProject($id)
    {
        // Check session to ensure user has logged in for this specific project
        if (!session('auth_project_' . $id)) {
            return redirect()->route('login', ['id' => $id])->with('error', 'Silakan login terlebih dahulu untuk mengakses proyek ini.');
        }

        $project = Project::findOrFail($id);
        return view('project', compact('project'));
    }
}
