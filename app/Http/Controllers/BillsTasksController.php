<?php

namespace App\Http\Controllers;

use App\bill;
use App\Task;
use App\Project;
use Illuminate\Http\Request;
use PDF;

class BillsTasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(bill $bill)
    {
        return view('bills.index',compact('bill'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project,Task $task,bill $bill)
    {
        // dd($task->bills);
        return view('bills.show',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(bill $bill)
    {
        //
    }

    public function printPDF(Project $project,Task $task){
        $this->authorize('update' , $project);
        $data = [
            'project'=>$project,
            'task'=>$task
        ];
        $pdf = PDF::loadView('print',$data);
        return $pdf->download('bill.pdf');
        // //return back();
    }
}
