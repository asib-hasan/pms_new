<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Expense;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ExpenseController extends Controller
{
    public function index(Request $request)
    {

        try {
            if($request->has('sk')){
                $keyword = $request->sk;
                $expense_list = Expense::where('expense_criteria', 'like', '%' . $keyword . '%')->paginate(20);
            }
            else{
                $expense_list = Expense::orderByDesc('expense_id')->paginate(15);
            }
            return view('main.expense.index', compact('expense_list'));
        }
        catch (QueryException $ex){
            return redirect()->back()->with('error', 'Process failed for - ' . $ex->getMessage());
        }
    }

    public function store(Request $request)
    {
        $rules = [
            'expense_criteria' => 'required|max:100',
            'expense_amount' => 'required|numeric|min:0',
            'expense_date' => 'required|date',
        ];

        $messages = [
            'expense_criteria.required' => 'Name required.',
            'expense_criteria.max' => 'Name cannot exceed 100 characters.',
            'expense_criteria.unique' => 'Name already exists.',
            'expense_amount.required' => 'Amount required.',
            'expense_amount.min' => 'Amount should be greater than zero.',
            'expense_date.required' => 'Date required.',
            'expense_date.date' => 'Invalid date format.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->with('inval',$validator->messages())->withInput();
        }

        try {
            DB::transaction(function () use ($request) {
                Expense::insert([
                    'expense_criteria' => $request->expense_criteria,
                    'expense_amount' => $request->expense_amount,
                    'expense_date' => $request->expense_date,
                    'created_by' => Auth::user()->admin_id,
                ]);
            });
            return redirect()->back()->with('success', 'Expense information saved successfully');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again.' . $e->getMessage());
        }
    }

    public function update(Request $request)
    {
        $id = $request->expense_id;

        if($id > 0 && is_numeric($id)) {
            $rules = [
                'expense_criteria' => 'required|max:100',
                'expense_amount' => 'required|numeric|min:0',
                'expense_date' => 'required|date',
            ];


            $messages = [
                'expense_criteria.required' => 'Name required.',
                'expense_criteria.max' => 'Name cannot exceed 100 characters.',
                'expense_criteria.unique' => 'Name already exists.',
                'expense_amount.required' => 'Amount required.',
                'expense_amount.min' => 'Amount should be greater than zero.',
                'expense_date.required' => 'Date required.',
                'expense_date.date' => 'Invalid date format.',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect()->back()->with('inval', $validator->messages())->withInput();
            }

            try {
                DB::transaction(function () use ($request, $id) {
                    Expense::where('expense_id', $id)->update([
                        'expense_criteria' => $request->expense_criteria,
                        'expense_amount' => $request->expense_amount,
                        'expense_date' => $request->expense_date,
                        'updated_by' => Auth::user()->admin_id,
                    ]);
                });
                return redirect()->back()->with('success', 'Expense information updated successfully');
            } catch (QueryException $e) {
                return redirect()->back()->with('error', 'Something went wrong. Please try again.' . $e->getMessage());
            }
        }
        else{
            return redirect()->back()->with('error','Invalid parameter or request');
        }
    }
}
