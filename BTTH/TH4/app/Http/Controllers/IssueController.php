<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;
use App\Models\Issue;
class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $issues = Issue::with('computer')->paginate(10); 
        return view('issues.index', compact('issues'));
    }
    
    // public function index()
    // {
    //     $issues = Issue::with('computer')->get(); // Đúng

    //     return view('issues.index',compact('issues'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $computers = Computer::all();
        return view('issues.create', compact('computers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'computer_id' => 'required|',
            'reported_by' => 'required|max:255',
            'reported_date' => 'required|date',
            'description' => 'required|max:255',
            'urgency' => 'required|in:Low,Medium,High',    
            'status' => 'required|in:Open,In Progress,Resolved', 
        ]);

        // Create a new issue
        Issue::create($validated);

        // Redirect with success message
        return redirect()->route('issues.index')->with('success', 'Sự cố đã được thêm thành công!');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $issues = Issue::findOrFail($id);
        $issues->delete();

        return redirect()->route('issues.index')->with('success', 'Đã xóa thành công!');
    }
}
