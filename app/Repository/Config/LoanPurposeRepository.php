<?php


namespace Repository\Config;

use App\Models\Configs\LoanPurpose;
use Repository\Repository;

class LoanPurposeRepository extends Repository
{
    public function model()
    {
        return LoanPurpose::class;
    }

    public function store($request)
    {
        return $this->model()::create($request->all());
    }

    public function update($loanPurposeID, $request)
    {
        $loanPurpose = parent::findOrFail($loanPurposeID);
        return $loanPurpose->update($request->all());
    }

    public function delete($loanPurposeID)
    {
        $loanPurpose = parent::findOrFail($loanPurposeID);
        return $loanPurpose->delete();
    }
}
