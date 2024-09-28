<?php

namespace App\Http\Controllers;

use App\Models\application;
use App\Models\Job;
use App\Models\Query;
use Illuminate\Database\Eloquent\Builder;

//add validator
//  namespace App\Http\Controllers\Validator;

use Illuminate\Http\Request;

class JobController extends Controller
{
    //     public function createJob(Request $request)
    // {
    //     // Validate the incoming request data
    //     $request->validate([
    //         'job_name' => 'required|string|max:255',
    //         'job_description' => 'required|string',
    //         'qualifications' => 'required|string',
    //         'responsibility' => 'required|string',
    //         'published_date' => 'required|date',
    //         'vacancy' => 'required|integer|min:1',
    //         'job_nature' => 'required|string|max:255',
    //         'salary' => 'nullable|numeric',
    //         'location' => 'required|string|max:255',
    //         'date_line' => 'nullable|date',
    //     ]);

    //         // Create the job
    //     $job = Job::create($request->all());
    //     // for Api 
    //     return response()->json(['message' => 'Job created successfully', 'job' => $job], 201);

    // }
    //retrive  all data from database

    /*************  ✨ Codeium Command ⭐  *************/
    /**
     * Returns a view with a list of all jobs in the database.
     *
     * @return \Illuminate\View\View
     */
    /******  5c2f82c5-205e-4365-b914-a28375c6bfa7  *******/
    public function getjob()
    {
        // $jobs = Job::all()->paginate(5);
        $jobs = Job::paginate(25);
        return view("joblist", compact("jobs"));
    }

    public function getjobdetail($id)
    {
        $job = Job::where('job_id', $id)->firstorfail();
        return view("job_detail", compact("job"));
    }
    public function Job_application(Request $request)
    {
        //submit form data
        $request->validate([

            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'job_role' => 'required|string|max:191',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'required|string',

        ]);
        //create form data
        $resumePath = $request->file('resume')->store('resumes');
        application::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'job_role' => $request->input('job_role'),
            // 'resume' => $resumePath,x`
            'cover_letter' => $request->input('cover_letter'),
        ]);
        return redirect()->back()->with('success', 'Application submitted successfully!');
    }
    public function query_submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'subject' => 'required|string',
            'message' => 'required|string'
        ]);
        Query::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ]);
        return redirect()->back()->with('success', 'Your Quiry is  submitted successfully!');
    }
    // public function job(Request $request)
    // {

    //     // Get all jobs for dropdowns
    //     $alljobs = Job::all();
    //     return view('job_dashboard', compact('alljobs'));
    // }
    public function job(Request $request)
    {


        $alljobs = Job::all();

        return view('job_dashboard', compact('alljobs'));
    }

    public function search(Request $request)
    {
        $jobs = Job::when($request->keyword, function (Builder $query) use ($request) {
            $query->where('job_name', 'LIKE', "%{$request->keyword}%");

        })->when($request->jobName && $request->jobName !== 'Job_Name', function (Builder $query) use ($request) {
            $query->where('job_name', $request->jobName);

        })->when($request->location && $request->location !== 'Location', function (Builder $query) use ($request) {
            $query->where('location', $request->location);

        })->paginate();


        return view('searchlist_data', compact('jobs'));
    }


}