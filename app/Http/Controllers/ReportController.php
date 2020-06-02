<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Report;
use App\ReportStatus;
use App\User;

class ReportController extends Controller
{
    public function createQ(Request $request, $question_id)
    {
      $report = new Report();
      $reportStatus = new ReportStatus();

      $this->authorize('createQ', $report);

      $report->reporter_id = Auth::user()->id;
      $report->question_id = $question_id;
      $report->description = $request->input('description');
      $report->save();

      $reportStatus->report_id = $report->id;
      $reportStatus->responsible_user = $this->getModerator();
      $reportStatus->save();

      return $report;
    }

    public function createA(Request $request, $answer_id)
    {
      $report = new Report();
      $reportStatus = new ReportStatus();

      $this->authorize('createA', $report);

      $report->reporter_id = Auth::user()->id;
      $report->answer_id = $answer_id;
      $report->description = $request->input('description');
      $report->save();

      $reportStatus->report_id = $report->id;
      $reportStatus->responsible_user = $this->getModerator();
      $reportStatus->save();

      return $report;
    }

    public function createC(Request $request, $comment_id)
    {
      $report = new Report();
      $reportStatus = new ReportStatus();

      $this->authorize('createC', $report);

      $report->reporter_id = Auth::user()->id;
      $report->comment_id = $comment_id;
      $report->description = $request->input('description');
      $report->save();

      $reportStatus->report_id = $report->id;
      $reportStatus->responsible_user = $this->getModerator();
      $reportStatus->save();

      return $report;
    }

    public function getModerator() {
        $moderators = DB::table('user')
                    ->join('user_management', 'user.id', '=', 'user_management.user_id')
                    ->select('user.id')
                    ->where('user_management.status', '=', 'moderator')
                    ->orWhere('user_management.status', '=', 'administrator')
                    ->get();

        if ($moderators != null)
            return $moderators[0]->id;
        else return null;
    }
}