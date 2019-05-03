<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CallCreditAPIFieldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert(
            "INSERT INTO `CallCreditAPIFields` (`FieldNames`, `Description`, `Type`, `rule_type`, `related_table`) VALUES
    
            ('maxloan', 'Maxloan', '','credit', ''),
            ('minloan', 'Minloan', '','credit', ''),
            ('ageflag', 'Older than 18', '','credit', ''),
            
            
            ('total_current_pay_day', 'Total current pay day loan', '', 'credit', ''),
            ('total_pay_day_last_3_months', 'Total Pay Day loan last 3 months', '', 'credit', ''),
            ('total_pay_day_loan', 'Total pay day loan ever', '', 'credit', ''),
            ('currently_default_in_payday', 'Currently default in Pay Day loan', 'Call Credit','credit', ''),
            
            ('max_arrears_in_mortgage_hp', 'Maximum arrears in Mortgage/HP', 'Call Credit','credit', ''),
            ('totalbalancesmortgages', 'Total balances (mortgage accounts)', 'Call Credit','credit', ''),
            
            ('ccj_amount_in_12_months', 'CCJ amount in 12 months', 'Call Credit','credit', ''),
            ('ccj_amount_in_36_months', 'CCJ amount in 36 months', 'Call Credit','credit', ''),
            
            
            ('score', 'Call Score (Fair Isaac)', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('abodeno', 'Abode No.', '','credit', 'CallCreditUserDetail'),
            ('actsharegreaterthan12mnths_excl_tel_max', 'Total number of active shares greater than 12 months excluding Telecoms and excluding Bank Accs without overdraft facility and excluding accounts over credit limit (max)', '','credit', 'CallCreditUserDetail'),
            ('actsharegreaterthan12mnths_excl_tel_min', 'Total number of active shares greater than 12 months excluding Telecoms and excluding Bank Accs without overdraft facility and excluding accounts over credit limit (min)', '','credit', 'CallCreditUserDetail'),
            ('actsharegreaterthan6mnths_excl_tel_max', 'Total number of active shares greater than 6 months excluding Telecoms and excluding Bank Accs without overdraft facility (max)', '','credit', 'CallCreditUserDetail'),
            ('actsharegreaterthan6mnths_excl_tel_min', 'Total number of active shares greater than 6 months excluding Telecoms and excluding Bank Accs without overdraft facility (min)', '','credit', 'CallCreditUserDetail'),
            ('alertdecision', 'Alert decision present (address associate)', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('alertreview', 'Alert review present (family associate)', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('autosearchmaxexceeded', 'No. of undeclared addresses searched & included', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('balancelimitratio', 'Balance o/s to Total Limits Ratio (revolving credit/budget)', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('buildingname', 'Building Name', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('buildingno', 'Building No.', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('current', 'Individual confirmed on Electoral roll at the current address', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('currentlyinsolvent', 'Currently Insolvent', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('DirectDebit', 'DirectDebit', 'Income Values','credit', 'CallCreditUserDetail'),
            ('EmploymentLength', 'EmploymentLength', 'Income Values','credit', 'CallCreditUserDetail'),
            ('hho', 'Household override - uses financial info on indivual at that address with same surname instead of indiviudal', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('ichboss', 'Bankruptcy order or Scottish sequestration in last 36 months', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('ichccj', '1 or more CCJ''s with a total value greater than ?500 in last 36 months', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('ichiva', 'Individual Voluntary Arrangement or administration order in last 36 months', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('ichsecured', 'Secured Loan Account with a Payment Status of 3 or Worse in last 24 months', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('ichunsecured', 'Unsecured Loan Account with a Payment Status of 3 or Worse in last 24 months', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('id', 'ID (call credit id)', '','credit', 'CallCreditUserDetail'),
            ('impairedcredit', 'Impaired Credit History', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('locality', 'Locality', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('messagecode', 'Match level of individual to address (1-9) 99 unknown', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('NetMonthlyPay', 'NetMonthlyPay', 'Income Values','credit', 'CallCreditUserDetail'),
            ('NextPayDate', 'NextPayDate', 'Income Values','credit', 'CallCreditUserDetail'),
            ('nocflag', 'Notice of Correction present', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('pafvalid', 'Address matched to Royal Mail Postcode Address File', '','credit', 'CallCreditUserDetail'),
            ('PayDayFreq', 'Pay Day Frequency', 'Income Values','credit', 'CallCreditUserDetail'),
            ('percentactgreat12mthovertotal_excl_tel_max', 'Percentage of active shares greater than 12mths / total active shares excluding Telecoms and excluding Bank Accs without overdraft facility and excluding accounts over credit limit (max)', '','credit', 'CallCreditUserDetail'),
            ('percentactgreat12mthovertotal_excl_tel_min', 'Percentage of active shares greater than 12mths / total active shares excluding Telecoms and excluding Bank Accs without overdraft facility and excluding accounts over credit limit (min)', '','credit', 'CallCreditUserDetail'),
            ('percentactgreat6mthovertotal_excl_tel_max', 'Percentage of active shares greater than 6mths / total active shares excluding Telecoms and excluding Bank Accs without overdraft facility (max)', '','credit', 'CallCreditUserDetail'),
            ('percentactgreat6mthovertotal_excl_tel_min', 'Percentage of active shares greater than 6mths / total active shares excluding Telecoms and excluding Bank Accs without overdraft facility (min)', '','credit', 'CallCreditUserDetail'),
            ('postcode', 'Postcode', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('posttown', 'Post town', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('PrimaryIncome', 'Primary Income', 'Income Values','credit', 'CallCreditUserDetail'),
            ('reporttype', 'Individual match score (0-5) 99 Unknown Code ', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('restricted', 'Currently Restricted', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('rollingroll', 'Information confirmed to Annual Electoral Roll', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('street1', 'Street 1', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('street2', 'Street 2', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('sublocality', 'Sub Locality', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('totalactiveccjs', 'No. of active CCJs', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('totalactiveshareaccs_excl_tel_max', 'Total number of active shares excluding Telecoms (max)', '','credit', 'CallCreditUserDetail'),
            ('totalactiveshareaccs_excl_tel_min', 'Total number of active shares excluding Telecoms (min)', '','credit', 'CallCreditUserDetail'),
            ('totalactiveshareaccs_max', 'Number of Active accounts (max)', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('totalactiveshareaccs_min', 'Number of Active accounts (min)', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('totalbalances', 'Total Balances (revolving credit/budget)', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('totalbalancesloans', 'Total balances (loans/installment credit)', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('totalccjamount', 'Total value of active CCJs', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('totalcifas', 'Number of CIFAS filings', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('totaldefaults12months', 'Number of Defaults in last 12 months', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('totaldefaults36months', 'Number of Defaults in last 36 months', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('totaldelinqs12months', 'Number of Delinquent Accounts in last 12 months', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('totaldischargedbais', 'No. of discharged BAIs in last 6 years', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('totaldisputes', 'Number of notices in Dispute', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('totalhomecreditsearches3months', 'No. of Home Credit searches in last 3 months', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('totalminpayments12months', 'Total Minimum Payments ONLY in last 12 months', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('totalminpayments36months', 'Total Minimum Payments ONLY in last 36 months', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('totalopened6months', 'Number of accounts Opened in last 6 months', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('totalsatisfiedccjs', 'No. of satisfied CCJs', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('totalsearches12months', 'No. of Searches in last 12 months', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('totalsearches3months', 'No. of Searches in last 3 months', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('totalsettledshareaccs', 'Number of Settled accounts', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('totalshareaccounts_max', 'Total number of accounts (on register) (max)', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('totalshareaccounts_min', 'Total number of accounts (on register) (min)', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('totalsharegreaterthan6mnths', 'Total number of accounts greater than 6 months old that have a last entry of OK, SF, ST (min)', '','credit', 'CallCreditUserDetail'),
            ('totalsharegreaterthan6mnths_excl_tel', 'Total number of accounts greater than 6 months old not including telecoms or Bank Accounts without an Overdraft that have a last entry of OK, SF, ST(min)', '','credit', 'CallCreditUserDetail'),
            ('totalundecaddresses', 'Total number of undeclared Addresses (all)', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('totalundecaddressessearched', 'Number of undeclared Addresses - searched', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('totalundecaddressesunsearched', 'Number of undeclared Addresses - not searched', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('totalundecaliases', 'Number of undeclared Aliases', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('totalundecassociates', 'Number of undeclared Associates', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('totalvaluecashadvances12months', 'Total Value of Cash Advances in last 12 months', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('totalvaluecashadvances36months', 'Total Value of Cash Advances in last 36 months', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('undeclaredaddresstype', 'Undeclared Address Type (1-5)', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('worsepaystatus12months', 'Worst payment status in last 12 months (across all credits)', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('worsepaystatus36months', 'Worst payment status in last 36 months (across all credits)', 'Call Credit','credit', 'CallCreditUserDetail'),
            ('max_vehicle_age_end_of_term', 'Max vehicle age end of term', '','credit', 'CallCreditUserDetail'),
            ('max_vehicle_mileage_end_of_term', 'Max vehicle mileage end of term', '','credit', 'CallCreditUserDetail'),
            
            
            ('cameofing', 'CAMEO Financial Group', 'Demographics','credit', 'CallCreditUserDemographic'),
            ('cameoincome', 'CAMEO Income Group', 'Demographics','credit', 'CallCreditUserDemographic'),
            ('cameoinvestor', 'CAMEO Investor Group', 'Demographics','credit', 'CallCreditUserDemographic'),
            ('cameoproperty', 'CAMEO Property Group', 'Demographics','credit', 'CallCreditUserDemographic'),
            ('cameouk', 'CAMEO UK Category', 'Demographics','credit', 'CallCreditUserDemographic'),
            ('ctaxband', 'Property Council Tax Band', 'Demographics','credit', 'CallCreditUserDemographic'),
            ('priceindex', 'Property Price Index', 'Demographics','credit', 'CallCreditUserDemographic'),
            
            
            ('amount','Debt Summary - available amount after all outgoings','capacity','TAC', 'CallCreditUserDetail'),
            ('debtpercentile','Debt Summary - Unsecured Debt to Income ratio percentile','turnoverpercentiles','TAC', 'CallCreditUserDetail'),
            ('incomecon','Debt Summary - Income Confidence','turnoverpercentiles','TAC', 'CallCreditUserDetail'),
            ('incomemax','Debt Summary - Ratio between Net monthly income and over-Indebtness Initiative Max Monthly Income','turnoverpercentiles','TAC', 'CallCreditUserDetail'),
            ('oiscore','Debt Summary - OI Score','debtsummary','TAC', 'CallCreditUserDetail'),
            ('percent','Debt Summary - percentage of amount available','capacity','TAC', 'CallCreditUserDetail'),
            ('percentile12','Debt Summary - Unsecured Debt to Income ratio percentile taken 12 months ago','turnoverpercentiles','TAC', 'CallCreditUserDetail'),
            ('percentile3','Debt Summary - Unsecured Debt to Income ratio percentile taken 3 months ago','turnoverpercentiles','TAC', 'CallCreditUserDetail'),
            ('ratioincomechg12','Debt Summary - percentage of change in income for last 12 months','turnoverpercentiles','TAC', 'CallCreditUserDetail'),
            ('ratioincomechg3','Debt Summary - percentage of change in income for last 3 months','turnoverpercentiles','TAC', 'CallCreditUserDetail'),
            ('risk','Debt Summary - Affordability risk','capacity','TAC', 'CallCreditUserDetail'),
            ('sai','Debt Summary - percentage of total payments to secured de3bt exceeds 80 percent - Only for Salaried Applicants','debtsummary','TAC', 'CallCreditUserDetail'),
            ('uai','Debt Summary - Total unsecured Debt to income based on turnover exceeds 20:1 - Only for salaried applicants','debtsummary','TAC', 'CallCreditUserDetail')"
        );
    }
}
