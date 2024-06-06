<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goal; // Assuming your model for goals is named Goal

class GoalController extends Controller
{
    // Method to display existing goals
    public function index()
    {
        $goals = Goal::all();
        return view('goals', compact('goals'));
    }

    // Method to store new goals
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'start_date' => 'nullable|date',
            'due_date' => 'required|date',
        ]);
    
        $validatedData['completed'] = false; // Default value for completed
        $validatedData['user_id'] = auth()->id(); // Assigning the authenticated user's id
    
        Goal::create($validatedData);
    
        return redirect()->route('goals.index')->with('success', 'Goal added successfully!');
    }
    public function markAsCompleted(Request $request)
{
    $goal = Goal::findOrFail($request->goal_id);
    $goal->markAsCompleted();
    return redirect()->back()->with('success', 'Goal marked as completed!');
}
// Method to delete a goal
public function destroy(Goal $goal)
{
    $goal->delete();
    return redirect()->back()->with('success', 'Goal removed successfully!');
}

 


    
}
