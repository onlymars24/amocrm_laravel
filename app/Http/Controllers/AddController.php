<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AmocrmClient;
use App\Models\Deal;
use App\Models\Status;
use App\Models\User;

class AddController extends Controller
{
    public function show_new_deals(){
        $leads = AmocrmClient::result('/api/v4/leads');
        
        $leads = json_decode($leads);
        $leads = $leads->_embedded->leads;
        $leads1 = [];
        foreach($leads as $lead){
            if(empty(Deal::find($lead->id))){
                $leads1[] = $lead;
            }
        }
        //dd($leads);
        return view('new-deals', ['leads' => $leads1]);
    }

    public function add_new_deals($id){
        $lead = AmocrmClient::result('/api/v4/leads/'.$id);
        $lead = json_decode($lead);
        Deal::create([
            'id' => $lead->id,
            'name' => $lead->name,
            'price' => $lead->price,
            'responsible_user_id' => $lead->responsible_user_id,
            'group_id' => $lead->group_id,
            'status_id' => $lead->status_id,
            'pipeline_id' => $lead->pipeline_id,
            'loss_reason_id' => $lead->loss_reason_id,
            'created_by' => $lead->created_by,
            'updated_by' => $lead->updated_by,
            'created_at' => $lead->created_at,
            'updated_at' => $lead->updated_at,
            'closed_at' => date('Y.m.d H:i:s', $lead->closed_at),
            'closest_task_at' => date('Y.m.d H:i:s', $lead->closest_task_at),
            'is_deleted' => $lead->is_deleted,
            'score' => $lead->score,
            'account_id' => $lead->account_id,
        ]);

        if(empty(User::find($lead->responsible_user_id))){
            $user = AmocrmClient::result('/api/v4/users/'.$lead->responsible_user_id);
            $user = json_decode($user);
            User::create([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'lang' => $user->lang,
                'rights' => json_encode($user->rights),
            ]);
        }
        if(empty(User::find($lead->created_by))){
            $user = AmocrmClient::result('/api/v4/users/'.$lead->created_by);
            $user = json_decode($user);
            User::create([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'lang' => $user->lang,
                'rights' => json_encode($user->rights),
            ]);
        }
        if(empty(User::find($lead->updated_by))){
            $user = AmocrmClient::result('/api/v4/users/'.$lead->updated_by);
            $user = json_decode($user);
            User::create([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'lang' => $user->lang,
                'rights' => json_encode($user->rights),
            ]);
        }
        if(empty(Status::find($lead->status_id))){
            $statuses = AmocrmClient::result('/api/v4/leads/pipelines/'.$lead->pipeline_id);
            $statuses = json_decode($statuses);
            $statuses = $statuses->_embedded->statuses;
            foreach($statuses as $el){
                if($el->id == $lead->status_id){
                    $status = $el;
                    break;
                }
            }
            Status::create([
                'id' => $status->id,
                'name' => $status->name,
                'sort' => $status->sort,
                'is_editable' => $status->is_editable,
                'pipeline_id' => $status->pipeline_id,
                'color' => $status->color,
                'type' => $status->type,
                'account_id' => $status->account_id,
            ]);
        }        

        return redirect('new-deals');
    }
}
