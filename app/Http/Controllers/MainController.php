<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Goal;
use App\Models\Saving;

class MainController extends Controller
{
    public function show() {
        $data = Goal::withSum('savings', 'amount')->get();
        $TS = Saving::sum('amount');
        $TG = Goal::sum('starting_goal');
        return view('index', ['data' => $data, 'count' => $data->count(), 'total' => $TS + $TG]);
    }

    public function createGoal() {
        return view('goals.create');
    }

    public function storeGoal(Request $request) {
        try {
            Goal::create($request->all());

            return redirect('/')->with('toast', [
                'type' => 'success',
                'message' => 'Goal created successfully!',
            ]);
        } catch (\Throwable $e) {
            return redirect('/')->with('toast', [
                'type' => 'error',
                'message' => 'Something went wrong. Please try again.',
            ]);
        }
    }

    public function destroyGoal(Goal $goal) {
        try {
            $goal->delete();

            return redirect('/')->with('toast', [
                'type' => 'success',
                'message' => 'Goal deleted successfully!',
            ]);
        } catch (\Throwable $e) {
            return redirect('/')->with('toast', [
                'type' => 'error',
                'message' => 'Something went wrong. Please try again.',
            ]);
        }
    }

    public function editGoal(Goal $goal) {
        return view('goals.edit', ['data' => $goal]);
    }

    public function storeSaving(Request $request, Goal $goal) {
        try {
            Saving::create([
                'goal_id' => $goal->id,
                'amount' => $request->amount
            ]);
            return redirect('/')->with('toast', [
                'type' => 'success',
                'message' => 'Saving created successfully!',
            ]);
        } catch (\Throwable $th) {
            return redirect('/')->with('toast', [
                'type' => 'error',
                'message' => 'Something went wrong. Please try again.',
            ]);
        }
    }

    public function updateGoal(Goal $goal, Request $request) {
        try {
            $goal->update($request->all());
            return redirect('/')->with('toast', [
                'type' => 'success',
                'message' => 'Goal updated successfully!',
            ]);
        } catch (\Throwable $th) {
            return redirect('/')->with('toast', [
                'type' => 'error',
                'message' => 'Something went wrong. Please try again.',
            ]);
        }
    }

    public function listSaving(Goal $goal) {
        $goal->loadSum('savings', 'amount')->load('savings');
        return view('savings.list', ['data' => $goal]);
    }

    public function createSaving(Goal $goal) {
        return view('savings.create', compact('goal'));
    }

    public function destroySaving(Saving $saving) {
        try {
            $saving->delete();

            return redirect()->route('savings.list', ['goal' => $saving->goal_id])->with('toast', [
                'type' => 'success',
                'message' => 'Saving deleted successfully!',
            ]);
        } catch (\Throwable $e) {
            return redirect()->route('savings.list', ['goal' => $saving->goal_id])->with('toast', [
                'type' => 'error',
                'message' => 'Something went wrong. Please try again.',
            ]);
        }
    }

    public function editSaving(Saving $saving) {
        return view('savings.edit', ['data' => $saving]);
    }

    public function updateSaving(Saving $saving, Request $request) {
        try {
            $saving->update($request->all());
            return redirect()->route('savings.list', ['goal' => $saving->goal_id])->with('toast', [
                'type' => 'success',
                'message' => 'Saving updated successfully!',
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('savings.list', ['goal' => $saving->goal_id])->with('toast', [
                'type' => 'error',
                'message' => 'Something went wrong. Please try again.',
            ]);
        }
    }

}
