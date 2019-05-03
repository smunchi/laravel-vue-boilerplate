<?php

namespace App\Http\Controllers\Backend\Config;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Repository\Config\LoanPurposeRepository;

class LoanPurposeController extends Controller
{
    public $repository;

    public function __construct(LoanPurposeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return view('backend.config.loan_purpose');
    }

    public function indexApi()
    {
        return response()->json($this->repository->getAll());
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|max:190']);
        if ($loanPurpose = $this->repository->store($request)) {
            return response()->json([
                'message' => 'loan purpose created successfully',
                'data' => $loanPurpose
            ], Response::HTTP_ACCEPTED);
        }
        return response()->json(['error' => 'Something went wrong'], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function update($loanPurposeID, Request $request)
    {
        $request->validate(['name' => 'required|max:190']);
        if ($loanPurpose = $this->repository->update($loanPurposeID, $request)) {
            return response()->json([
                'message' => 'loan purpose update successfully',
                'data' => $loanPurpose
            ], Response::HTTP_ACCEPTED);
        }
        return response()->json(['error' => 'Something went wrong'], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function destroy($loanPurposeID)
    {
        if ($loanPurpose = $this->repository->delete($loanPurposeID)) {
            return response()->json([
                'message' => 'loan purpose delete successfully'
            ], Response::HTTP_ACCEPTED);
        }
        return response()->json(['error' => 'Something went wrong'], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
