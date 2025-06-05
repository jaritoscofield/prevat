<?php

namespace App\Scope;

use App\Manager\CompanyManager;
use App\Tenant\ManagerTenant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class CompanyScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $CompanyManager = new CompanyManager();
        $company_id = $CompanyManager->getCompanyIdentify();
        $contract_id =  $CompanyManager->getContractDefault();

        $builder->where('company_id', $company_id);

        if(Auth::user()->company->type != 'admin') {
            $builder->where('contract_id', $contract_id);
        }
    }
}
