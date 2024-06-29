<?php

namespace App\Jobs;

use App\V1\Client\Client;
use App\V1\Plan\Plan;
use App\V1\Plan\PlanNetwork;
use App\V1\Plan\PlanNetworkCheque;
use App\V1\Plan\PlanNetworkChequeDetail;
use App\V1\Payment\CompanyLedger;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use DateTime;
use DateInterval;

class ChequeCycle implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $tries = 3;

    protected $signature = 'log:cron';

    public function __construct(){

    }

    public function handle(){
        $CurrentTime = new DateTime('now');
        $Day = strtoupper($CurrentTime->format('l'));
        
        $Plans = Plan::where("PlanStatus","ACTIVE")->where('ChequeEarnDay', 'like', '%' . $Day . '%')->get();
        foreach($Plans as $Plan){
            $LeftBalanceNumber = $Plan->LeftBalanceNumber;
            $RightBalanceNumber = $Plan->RightBalanceNumber;
            $LeftMaxOutNumber = $Plan->LeftMaxOutNumber;
            $RightMaxOutNumber = $Plan->RightMaxOutNumber;
            $PlanChequeValue = $Plan->ChequeValue;
            $ChequeMaxOut = $Plan->ChequeMaxOut;

            $PlanNetwork = PlanNetwork::where("IDPlan",$Plan->IDPlan)->get();
            foreach($PlanNetwork as $Person){
                $IDClient = $Person->IDClient;
                $AgencyNumber = $Person->PlanNetworkAgencyNumber;
                $Counter = 1;
                while($Counter <= $AgencyNumber){
                    $LeftNetworkNumber = 0;
                    $RightNetworkNumber = 0;
                    $ChequeValue = 0;

                    $PreviousNetworkClients = PlanNetworkChequeDetail::where("IDClient",$IDClient)->pluck("IDClientNetwork")->toArray();
                    $LeftNetwork = PlanNetwork::where("IDParentClient",$IDClient)->where("PlanNetworkAgency",$Counter)->where("PlanNetworkPosition","LEFT")->first();
                    $RightNetwork = PlanNetwork::where("IDParentClient",$IDClient)->where("PlanNetworkAgency",$Counter)->where("PlanNetworkPosition","RIGHT")->first();
                    
                    if($LeftNetwork){
                        $IDClient = $LeftNetwork->IDClient;
                        $Key = $IDClient."-";
                        $SecondKey = $IDClient."-";
                        $ThirdKey = "-".$IDClient;
                        $AllNetwork = PlanNetwork::leftjoin("clients","clients.IDClient","plannetwork.IDClient")->leftjoin("clients as C1","C1.IDClient","plannetwork.IDReferralClient")->where("plannetwork.PlanNetworkAgency",$Counter)->whereNotIn("plannetwork.IDClient",$PreviousNetworkClients);
                        $AllNetwork = $AllNetwork->where(function ($query) use ($IDClient,$Key,$SecondKey,$ThirdKey) {
                            $query->where("plannetwork.PlanNetworkPath", 'like',$IDClient . '%')
                            ->orwhere("plannetwork.PlanNetworkPath",$IDClient)
                            ->orwhere("plannetwork.PlanNetworkPath", 'like',$Key . '%')
                            ->orwhere("plannetwork.PlanNetworkPath", 'like','%'.$SecondKey . '%')
                            ->orwhere("plannetwork.PlanNetworkPath", 'like','%'.$ThirdKey . '%');
                        });
            
                        $LeftNetworkNumber = $AllNetwork->count();
                        $LeftNetwork = $AllNetwork->select("plannetwork.IDClient")->get()->pluck("IDClient")->toArray();
                        if (!in_array($IDClient, $PreviousNetworkClients)){
                            array_push($LeftNetwork, $IDClient);
                            $LeftNetworkNumber++;
                        }
                    }
            
                    if($RightNetwork){
                        $IDClient = $RightNetwork->IDClient;
                        $Key = $IDClient."-";
                        $SecondKey = $IDClient."-";
                        $ThirdKey = "-".$IDClient;
                        $AllNetwork = PlanNetwork::leftjoin("clients","clients.IDClient","plannetwork.IDClient")->leftjoin("clients as C1","C1.IDClient","plannetwork.IDReferralClient")->where("plannetwork.PlanNetworkAgency",$Counter)->whereNotIn("plannetwork.IDClient",$PreviousNetworkClients);
                        $AllNetwork = $AllNetwork->where(function ($query) use ($IDClient,$Key,$SecondKey,$ThirdKey) {
                            $query->where("plannetwork.PlanNetworkPath", 'like',$IDClient . '%')
                            ->orwhere("plannetwork.PlanNetworkPath",$IDClient)
                            ->orwhere("plannetwork.PlanNetworkPath", 'like',$Key . '%')
                            ->orwhere("plannetwork.PlanNetworkPath", 'like','%'.$SecondKey . '%')
                            ->orwhere("plannetwork.PlanNetworkPath", 'like','%'.$ThirdKey . '%');
                        });
            
                        $RightNetworkNumber = $AllNetwork->count();
                        $RightNetwork = $AllNetwork->select("plannetwork.IDClient")->get()->pluck("IDClient")->toArray();
                        if (!in_array($IDClient, $PreviousNetworkClients)){
                            array_push($RightNetwork, $IDClient);
                            $RightNetworkNumber++;
                        }
                    }

                    if($LeftNetworkNumber > $LeftMaxOutNumber){
                        $LeftNetworkNumber = $LeftMaxOutNumber;
                    }
                    if($RightNetworkNumber > $RightMaxOutNumber){
                        $RightNetworkNumber = $RightMaxOutNumber;
                    }

                    if($LeftBalanceNumber <= $LeftNetworkNumber && $RightBalanceNumber <= $RightNetworkNumber){

                        $LeftNumber = intdiv($LeftNetworkNumber, $LeftBalanceNumber);
                        $RightNumber = intdiv($RightNetworkNumber, $RightBalanceNumber);
                        if($LeftNumber <= $RightNumber){
                            $Number = $LeftNumber;
                        }
                        if($RightNumber <= $LeftNumber){
                            $Number = $RightNumber;
                        }
                        $ChequeValue = $Number * $PlanChequeValue;

                        $LeftNumber = $Number * $LeftBalanceNumber;
                        $RightNumber = $Number * $RightBalanceNumber;
                        if($LeftNumber <= $RightNumber){
                            $Number = $LeftNumber;
                        }
                        if($RightNumber <= $LeftNumber){
                            $Number = $RightNumber;
                        }
                        $IDClient = $Person->IDClient;
                        $Client = Client::find($IDClient);

                        $PlanNetworkCheque = new PlanNetworkCheque;
                        $PlanNetworkCheque->IDPlanNetwork = $Person->IDPlanNetwork;
                        $PlanNetworkCheque->ChequeLeftNumber = $Number;
                        $PlanNetworkCheque->ChequeRightNumber = $Number;
                        $PlanNetworkCheque->ChequeLeftReachedNumber = $LeftNetworkNumber;
                        $PlanNetworkCheque->ChequeRightReachedNumber = $RightNetworkNumber;
                        $PlanNetworkCheque->ChequeValue = $ChequeValue;
                        $PlanNetworkCheque->AgencyNumber = $Counter;
                        $PlanNetworkCheque->save();

                        $CompanyLedger = new CompanyLedger;
                        $CompanyLedger->IDSubCategory = 19;
                        $CompanyLedger->CompanyLedgerAmount = $ChequeValue;
                        $CompanyLedger->CompanyLedgerDesc = "Cheque Payment to Client ".$Client->ClientName;
                        $CompanyLedger->CompanyLedgerProcess = "AUTO";
                        $CompanyLedger->CompanyLedgerType = "DEBIT";
                        $CompanyLedger->save();


                        $IDPlanNetworkCheque = $PlanNetworkCheque->IDPlanNetworkCheque;

                        for ($I = 0; $I < $Number; $I++) {
                            $PlanNetworkChequeDetail = new PlanNetworkChequeDetail;
                            $PlanNetworkChequeDetail->IDPlanNetworkCheque = $IDPlanNetworkCheque;
                            $PlanNetworkChequeDetail->IDClient = $IDClient;
                            $PlanNetworkChequeDetail->IDClientNetwork = $LeftNetwork[$I];
                            $PlanNetworkChequeDetail->save();

                            $PlanNetworkChequeDetail = new PlanNetworkChequeDetail;
                            $PlanNetworkChequeDetail->IDPlanNetworkCheque = $IDPlanNetworkCheque;
                            $PlanNetworkChequeDetail->IDClient = $IDClient;
                            $PlanNetworkChequeDetail->IDClientNetwork = $RightNetwork[$I];
                            $PlanNetworkChequeDetail->save();
                        }
                          
                    }

                    $Counter++;
                }
            }
        }

       
    }
}
