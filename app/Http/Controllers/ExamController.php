<?php

namespace App\Http\Controllers;

use App\Models\CertificateFile;
use App\Models\Exam;
use App\Models\ExamStart;
use App\Models\Result;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ExamController extends Controller
{
    public function viewExam()
    {
        $user = auth()->user();
        return view('exam.index', compact('user'));
    }

    public function examStart($id)
	{
		$id = decrypt($id);
		$mytime = now();
		$max_attempts = 2;
		$examstart = ExamStart::where('user_id', Auth::user()->id)->where('exam_id', $id)->first();
		$userId = Auth::user()->id;
		$examId = $id;

		if($examstart && $examstart->attempts >= 2){
			return redirect()->route('exam.view')->with('error', 'You already use your two attempts for exam!');
		}
		ExamStart::updateOrCreate(
			[
				'user_id' => $userId,
				'exam_id' => $examId,
			],
			[
				'start_time' => $mytime->format('Y-m-d H:i:s'),
				'end_time' => $mytime->format('Y-m-d H:i:s'),
				'questions_ans' => '',
				'status' => 'In Progress',
				'attempts' => $examstart ? ($examstart->attempts + 1) : 1, // Increment attempts if record exists, or set to 1 if it doesn't.
			]
		);
		return view('exam.start', compact('id', 'max_attempts'));
	}

    public static function startTime($examId)
	{
		$exam_data = Exam::where('id', $examId)->first();
		$duration = $exam_data->exam_duration;
		$mytime = new DateTime();
		$currentSystemTime = strtotime($mytime->format('Y-m-d H:i:s'));
		$examstart = ExamStart::where('user_id', Auth::user()->id)->where('exam_id', $examId)->first();
		$startTime = $examstart->start_time;

		$totalExamTimeCompleted = date("M d, Y H:i:s", strtotime('+' . $duration . ' minutes', strtotime($startTime)));

		if (strtotime($totalExamTimeCompleted) > $currentSystemTime) {
			return $totalExamTimeCompleted;
		} else {
			return "Exam time over" . $mytime->format('Y-m-d H:i:s');
		}
	}

    public function getExamQuestion($id)
	{
		$user = auth()->user();
		$examstart = ExamStart::where('user_id', Auth::user()->id)->where('exam_id', $id)->first();
		$data = DB::table('questions')
			->select('questions.*')
			->where('questions.attempt', $examstart->attempts)
			->where('questions.recruiter_type', $user->recruiter_type)
			->get();
		$exam_data = Exam::where('id', $id)->first();

		$exam_question = array();

		$exam = array();
		$exam["Id"] = $id;
		$exam["Name"] = $exam_data->exam_name;
		$exam["ExamInstructions"] = $exam_data->exam_instructions;
		$exam["MarksPerQuestion"] = $exam_data->marks_per_question;
		$exam["ExamDuration"] = $exam_data->exam_duration . " Min";
		$exam["ExamStartDateTime"] = $exam_data->exam_start_date;
		$exam["MaxTabSwitchAllow"] = $exam_data->max_tab_switch_allow;
		$exam["TotalTabSwtiched"] = 0;
		$exam["NegativeMakrsPerQuestion"] = $exam_data->negative_makrs_per_question;
		$exam["m_p_r_to_pass"] = $exam_data->m_p_r_to_pass;

		$exam_question['exam'] = $exam;

		$i = 1;
		$question1 = array();
		foreach ($data as $value) :
			$question = array();
			$question["count"] = $i++;
			$question["id"] = $value->id;
			$question["type"] = $value->type;
			$question["question"] = $value->question;
			$question["options_1"] = $value->options_1;
			$question["options_2"] = $value->options_2;
			$question["options_3"] = $value->options_3;
			$question["options_4"] = $value->options_4;
			$question["answer"] = strtoupper($value->answer);
			$question["mark"] = $value->marks;

			$studentInput1 = array();
			$studentInput1["answer"] = "";
			$studentInput1["type"] = $value->type;
			$studentInput1["notes"] = "";

			$studentInput = array();
			$studentInput[] = $studentInput1;
			$question['studentInput'] = $studentInput;

			$question1[] = $question;
		endforeach;
		$exam_question['questions'] = $question1;

		return response()->json(['status' => true, 'message' => 'Data found', 'questions' => $exam_question]);
	}

	public function saveExam(Request $request, $exam_id)
	{
		$mytime = new DateTime();
		$examstart = ExamStart::where('user_id', Auth::user()->id)->where('exam_id', $exam_id)->first();
		$examstart->end_time = $mytime->format('Y-m-d H:i:s');
		$examstart->questions_ans = $request->questions_ans;
		$examstart->status = $request->typeAction;
		$examstart->save();

		if ($examstart->status == 'DevToolComplete' || $examstart->status == 'MaxTabSwitchAllowReached' || $examstart->status == 'Complete') {
		    Log::info($examstart->status);
			$this->result($exam_id);
			return response()->json(['status' => true, 'message' => 'Exam are Over']);
		}
	}

	public function result($id)
	{
		$check_result = Result::where('user_id', Auth::user()->id)->where('exam_id', $id)->first();
		
		$examstart = Examstart::where('user_id', Auth::user()->id)->where('exam_id', $id)->first();
		$questions_ans = json_decode($examstart->questions_ans);
		$ans_count = 0;
		$ans_fails = 0;
		$total_ans_qus = 0;
		foreach ($questions_ans->questions as $key => $value) :
			foreach ($value->studentInput as $key1 => $value1) :
				if ($value1->answer != '' && $value1->type == 'answered') :
					$total_ans_qus = $total_ans_qus + 1;

					if (is_array($value1->answer)) {
						if ($value->answer == implode(",", $value1->answer)) :
							$ans_count = $ans_count + $value->mark;
						else :
							$ans_fails = $ans_fails + $value->mark;
						endif;
					} else {
						if ($value->answer == $value1->answer) :
							$ans_count = $ans_count + $value->mark;
						else :
							$ans_fails = $ans_fails + $value->mark;
						endif;
					}


				endif;
			endforeach;
		endforeach;

		$pass_fails = $ans_count - ($ans_fails * $questions_ans->exam->NegativeMakrsPerQuestion);
		if ($pass_fails >= $questions_ans->exam->m_p_r_to_pass) {
			$result_status = 'Pass';
		} else {
			$result_status = 'Failed';
		}
		
		$resultsData = [
			'exam_id' => $examstart->exam_id,
			'user_id' => $examstart->user_id,
			'total_ans' => $total_ans_qus,
			'total_marks' => $ans_count,
			'total' => count($questions_ans->questions),
			'negative' => ($ans_fails * $questions_ans->exam->NegativeMakrsPerQuestion),
			'status' => $examstart->status,
			'result_status' => $result_status,
			'm_p_r_to_pass' => $questions_ans->exam->m_p_r_to_pass,
		];
		if($check_result && $check_result->total_marks > $ans_count){
			// Nothing to happend
		} else {
			Result::updateOrCreate(
				['user_id' => $examstart->user_id, 'exam_id' => $examstart->exam_id],
				$resultsData
			);
		}
		$user = auth()->user();
		if ($result_status === 'Pass') {
			$result = Result::where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->first();
		    $currentDate = new DateTime();
			$currentDate->modify('+1 year');
			$formattedDate = $currentDate->format('M j, Y');
			// Create certificate logic here
			if($user->recruiter_type === "domestic") {
				$recruitment_type = "Domestic";
			} else {
				$recruitment_type = "US";
			}
			$percentage = (($result->total_marks / $result->total) * 100);
			$percentage = number_format($percentage, 2);
			$certificateData = [
				'user_name' => Auth::user()->name,
				'course_name' => 'CertifyRecruit Examination',
				'completion_date' => now()->format('M j, Y'),
				'end_date' => $formattedDate,
				'recruitment_type' => $recruitment_type,
				'percentage' => $percentage,
			];

			$this->sendCertificateEmail($examstart->user_id, $certificateData);
			Log::info('here');
		}
		return Result::where('user_id', Auth::user()->id)->where('exam_id', $id)->first();
	}

	private function sendCertificateEmail($userId, $certificateData)
	{
		$pdfContent = $this->generateCertificatePDF($certificateData);
		$userEmail = User::find($userId)->email;
		$pdfFileName = 'certificate_' . $userId . '_' . time() . '.pdf';
		$relativeFilePath = 'certificates/' . $pdfFileName;
		$certificateUrl = asset($relativeFilePath);

		$storagePath = storage_path('app/temp/');
		if (!file_exists($storagePath)) {
			mkdir($storagePath, 0777, true);
		}
		file_put_contents(storage_path('app/temp/' . $pdfFileName), $pdfContent);

		CertificateFile::updateOrCreate(
			['user_id' => $userId],
			['filename' => $pdfFileName]
		);
		Mail::send('emails.certificate_email', [
			'userName' => Auth::user()->name,
			'courseName' => 'CertifyRecruit Examination',
			'certificateUrl' => $certificateUrl,
		], function ($message) use ($userEmail, $pdfFileName) {
			$message->to($userEmail)
				->subject('Certificate of Completion - "CertifyRecruit Examination"')
				->attach(storage_path('app/temp/' . $pdfFileName));
		});
	}

	private function generateCertificatePDF($certificateData)
	{
		$options = new Options();
		$options->set('defaultFont', 'Arial');

		$dompdf = new Dompdf($options);
		$dompdf->loadHtml(view('certificate_template', ['data' => $certificateData]));

		$dompdf->setPaper(array(0, 0, 612.00, 780.00), 'landscape');
		$dompdf->render();

		return $dompdf->output(); // Get the PDF content as a string
	}

	public function downloadCertificate()
	{
		$certificate = CertificateFile::where('user_id', auth()->user()->id)
        ->orderBy('created_at', 'desc')
        ->first();

		if (!$certificate) {
			return back()->with('error', 'Certificate not found.');
		}

		// Assuming the certificate files are stored in the "public/certificates" directory.
		$relativeFilePath = 'certificates/' . $certificate->filename;

		// Generate a URL to the certificate file.
		$certificateUrl = asset($relativeFilePath);

		return redirect($certificateUrl);
	}

	public function openInNewTab($filename)
	{
		// Assuming the certificate files are stored in the "storage/app/temp" directory.
		$pdfFilePath = storage_path('app/temp/' . $filename);

		if (!file_exists($pdfFilePath)) {
			return back()->with('error', 'Certificate not found.');
		}

		return response()->file($pdfFilePath);
	}
}
