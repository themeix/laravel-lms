<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\Course_lecture;
use App\Models\CourseLecture;
use App\Models\Discussion;
use App\Models\Exam;
use App\Models\LiveClass;
use App\Models\NoticeBoard;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\OrderItem;
use App\Models\Question;
use App\Models\Review;
use App\Models\Take_exam;
use App\Models\TakeExam;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyCourseController extends Controller
{
    public function thankYou()
    {
        $new_order = Order::whereUserId(auth()->id())->latest()->first();
        $data['new_courses'] = [];
        if ($new_order) {
            $newCourseIds = OrderItem::whereOrderId($new_order->id)->pluck('course_id')->toArray();
            $data['new_courses'] = Course::whereIn('id', $newCourseIds)->get();
        }
        return view('frontend.thankyou', $data);
    }


    public function downloadInvoice($item_id)
    {
        $item = OrderItem::find($item_id);

        $invoice_name = 'invoice' . '.pdf';
        // make sure email invoice is checked.
        $customPaper = array(0, 0, 612, 792);
        $pdf = PDF::loadView('frontend.student.course.invoice', ['item' => $item])->setPaper($customPaper, 'portrait');
        $pdf->save(public_path() . '/uploads/receipt/' . $invoice_name);
        // return $pdf->stream($invoice_name);
        return $pdf->download($invoice_name);
    }



    public function myCourseShow(Request $request, $slug, $action_type = null, $quiz_uuid = null, $answer_id = null)
    {
        $data['pageTitle'] = "Course Details";
        $data['course'] = Course::whereSlug($slug)->firstOrfail();

        // Start:: Checking enrolled or not
        $user = Auth::user();
        $allUserOrder = Order::where('user_id', $user->id);
        $paidOrderIds = $allUserOrder->where('payment_status', 'paid')->pluck('id')->toArray();

        $allUserOrder = Order::where('user_id', $user->id);
        $freeOrderIds = $allUserOrder->where('payment_status', 'free')->pluck('id')->toArray();

        $orderIds = array_merge($paidOrderIds, $freeOrderIds);

        $courseIds = OrderItem::whereIn('order_id', $orderIds)->pluck('course_id')->toArray();
        if ($courseIds) {
            if (!in_array($data['course']->id, $courseIds)) {
                abort('403');
            }
        }
        // End:: Checking enrolled or not

        $data['total_enrolled_students'] = OrderItem::where('course_id', $data['course']->id)->whereHas('order', function ($q) {
            $q->where('payment_status', 'paid');
        })->count();
        $data['enrolled_students'] = OrderItem::where('course_id', $data['course']->id)->whereHas('order', function ($q) {
            $q->where('payment_status', 'paid');
        })->take(4)->get();

        //Start:: Assignment
        $data['assignments'] = Assignment::where('course_id', $data['course']->id)->get();
        //End:: Assignment
        //Start:: Notice
        $data['notices'] = NoticeBoard::whereCourseId($data['course']->id)->latest()->get();
        //End:: Notice

        //Start:: Live Class
        $now = now();

        $data['upcoming_live_classes'] = LiveClass::whereCourseId($data['course']->id)
            ->where('date', '>=', $now)
            ->latest()->get();

        $data['past_live_classes'] = LiveClass::whereCourseId($data['course']->id)
            ->where('date', '<=', $now)
            ->latest()->get();
        //End:: Live Class

        //Start:: Review
        $data['reviews'] = Review::whereCourseId($data['course']->id)->latest()->paginate(3);
        $data['loadMoreShowButtonReviews'] = Review::whereCourseId($data['course']->id)->paginate(4);
        $data['five_star_count'] = Review::whereCourseId($data['course']->id)->whereRating(5)->count();
        $data['four_star_count'] = Review::whereCourseId($data['course']->id)->whereRating(4)->count();
        $data['three_star_count'] = Review::whereCourseId($data['course']->id)->whereRating(3)->count();
        $data['two_star_count'] = Review::whereCourseId($data['course']->id)->whereRating(2)->count();
        $data['first_star_count'] = Review::whereCourseId($data['course']->id)->whereRating(1)->count();

        $data['total_reviews'] = (5 * $data['five_star_count']) + (4 * $data['four_star_count']) + (3 * $data['three_star_count']) +
            (2 * $data['two_star_count']) + (1 * $data['first_star_count']);
        $data['total_user_review'] = $data['five_star_count'] + $data['four_star_count'] + $data['three_star_count'] + $data['two_star_count'] + $data['first_star_count'];
        if ($data['total_user_review'] > 0) {
            $data['average_rating'] = $data['total_reviews'] / $data['total_user_review'];
        } else {
            $data['average_rating'] = 0;
        }

        $total_reviews = Review::whereCourseId($data['course']->id)->count();

        if ($total_reviews > 0) {
            $data['five_star_percentage'] = ($data['five_star_count'] / $total_reviews) * 100;

            $data['four_star_percentage'] = 100 * ($data['four_star_count'] / $total_reviews);
            $data['three_star_percentage'] = 100 * ($data['three_star_count'] / $total_reviews);
            $data['two_star_percentage'] = 100 * ($data['two_star_count'] / $total_reviews);
            $data['first_star_percentage'] = 100 * ($data['first_star_count'] / $total_reviews);
        } else {
            $data['five_star_percentage'] = 0;
            $data['four_star_percentage'] = 0;
            $data['three_star_percentage'] = 0;
            $data['two_star_percentage'] = 0;
            $data['first_star_percentage'] = 0;
        }

        //End:: Review
        $data['discussions'] = Discussion::whereCourseId($data['course']->id)->whereNull('parent_id')->active()->get();

        if (!is_null($action_type) && !is_null($quiz_uuid)) {
            $data['exam'] = Exam::whereUuid($quiz_uuid)->first();

            if ($action_type == 'start-quiz') {

                if (TakeExam::whereUserId(auth()->user()->id)->whereExamId($data['exam']->id)->count() == 0) {
                    $take_exam = new TakeExam();
                    $take_exam->exam_id = $data['exam']->id;
                    $take_exam->save();
                }

                $data['take_exam'] = TakeExam::whereUserId(auth()->user()->id)->whereExamId($data['exam']->id)->orderBy('id', 'DESC')->first();

                $question_ids = Answer::whereUserId(auth()->user()->id)->whereExamId($data['exam']->id)->pluck('question_id')->toArray();
                $data['question'] = Question::whereExamId($data['exam']->id)->whereNotIn('id', $question_ids)->first();
                $data['number_of_answer'] = Answer::whereUserId(auth()->user()->id)->whereExamId($data['exam']->id)->count();


                $now = Carbon::now();
                $expend_second = $now->diffInSeconds($data['take_exam']->created_at);

                if (Carbon::parse($data['exam']->duration * 60)->subSecond($expend_second)->format('H:i:s') > Carbon::parse($data['exam']->duration * 60)->format('H:i:s')) {
                    return redirect(route('student.my-course.show', [$data['course']->slug, 'quiz-result', $data['exam']->uuid]));
                }

            }


            if ($action_type == 'leaderboard') {
                $data['top5_take_exams'] = TakeExam::whereExamId($data['exam']->id)->orderBy('number_of_correct_answer', 'DESC')->take(5)->get();
                $data['take_exams'] = TakeExam::whereExamId($data['exam']->id)->orderBy('number_of_correct_answer', 'DESC')->skip(5)->take(500)->get();
            }


        }

        if (!is_null($answer_id)) {
            $data['answer'] = Answer::find($answer_id);
        }

        $data['action_type'] = $action_type;
        $data['quiz_uuid'] = $quiz_uuid;
        $data['answer_id'] = $answer_id;

        /** ------- save certificate ----------- */

        if ($request->get('lecture_uuid')) {
            $lecture = CourseLecture::where('uuid', $request->get('lecture_uuid'))->firstOrFail();
            $nextLectureId = CourseLecture::where('lesson_id', $lecture->lesson_id)->where('id', '>', $lecture->id)->min('id');

            if ($nextLectureId) {
                $nextLecture = CourseLecture::find($nextLectureId);
                $data['nextLectureUuid'] = $nextLecture->uuid;
            } else {
                $data['nextLectureUuid'] = null;
            }

            if ($lecture->type == 'video') {
                $data['video_src'] = $lecture->file_path;
            } elseif ($lecture->type == 'youtube') {
                $data['youtube_video_src'] = $lecture->url_path;
            } elseif ($lecture->type == 'vimeo') {
                $data['vimeo_video_src'] = $lecture->url_path;
            }
            $data['lecture_type'] = $lecture->type;
            $data['lesson_id_check'] = @$lecture->lesson->id;
            $data['lecture_id_check'] = $lecture->id;
            $data['navLessonActive'] = 'on';
            $data['subNavLectureActiveClass'] = 'show';

        }


        return view('frontend.student.course.course-details', $data);
    }



    public function myLearningCourseList(Request $request)
    {
        $data['pageTitle'] = 'My Learning Courses';

        $allUserOrder = Order::where('user_id', auth()->id());
        $paidOrderIds = $allUserOrder->where('payment_status', 'paid')->pluck('id')->toArray();

        $allUserOrder = Order::where('user_id', auth()->id());
        $freeOrderIds = $allUserOrder->where('payment_status', 'free')->pluck('id')->toArray();

        $orderIds = array_merge($paidOrderIds, $freeOrderIds);

        $data['orderItems'] = OrderItem::whereIn('order_id', $orderIds);

        if ($request->ajax()) {
            $sortByID = $request->sortByID; // 1=newest, 2=Oldest
            if ($sortByID) {
                $data['orderItems'] = OrderItem::whereIn('order_id', $orderIds);
                if ($sortByID == 1) {
                    $data['orderItems'] = $data['orderItems']->latest()->paginate();
                }

                if ($sortByID == 2) {
                    $data['orderItems'] = $data['orderItems']->paginate();
                }
            }

            return view('frontend.student.course.render-courses-list', $data);
        }

        $data['orderItems'] = $data['orderItems']->latest()->paginate();

        return view('frontend.student.course.myLearningCourseList', $data);
    }
}
