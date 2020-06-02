<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\ReportStatus;

class ReportStatusController extends Controller
{
    public function resolve(Request $request, $report_id) {

        $report_status =  ReportStatus::where('report_id', $report_id)->first();

        $this->authorize('resolve', $report_status);

        $report_status->state = 'resolved';
        $report_status->comment = $request->input('comment');
        $report_status->responsible_user = Auth::user()->id;
        $report_status->save();

        return $report_status;
    }
}