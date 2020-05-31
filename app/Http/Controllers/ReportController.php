<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Report;
use App\ReportStatus;

class ReportController extends Controller
{
    public function create(Request $request, $question_id)
    {
      $report = new Report();
      $reportStatus = new ReportStatus();

      $this->authorize('create', $report);

      //TODO comments, answers and user reports
      $report->reporter_id = Auth::user()->id;
      $report->question_id = $question_id;
      $report->description = $request->input('description');
      $report->save();

      $reportStatus->report_id = $report->id;
      //TODO
      $reportStatus->responsible_user = 1;
      $reportStatus->save();

      return $report;
    }
}