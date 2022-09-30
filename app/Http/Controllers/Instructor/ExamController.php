<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Question_option;
use App\Models\QuestionOption;
use App\Tools\Repositories\Crud;
use Illuminate\Http\Request;

class ExamController extends Controller
{

    protected $model;
    protected $courseModel;
    protected $questionModel;

    public function __construct(Exam $exam, Course $course, Question $question)
    {
        $this->model = new Crud($exam);
        $this->courseModel = new Crud($course);
        $this->questionModel = new Crud($question);
    }

    public function index($course_uuid)
    {
        $data['course'] = $this->courseModel->getRecordByUuid($course_uuid);
        $data['exams'] = Exam::where('course_id', $data['course']->id)->get();
        return view('instructor.course.exam.index', $data);
    }


    public function create($course_uuid)
    {
        $data['navCourseActiveClass'] = 'active';
        $data['course'] = $this->courseModel->getRecordByUuid($course_uuid);
        return view('instructor.course.exam.create', $data);
    }


    public function store(Request $request, $course_uuid)
    {
        $course = $this->courseModel->getRecordByUuid($course_uuid);

        $data = [
            'course_id' => $course->id,
            'name' => $request->name,
            'marks_per_question' => $request->marks_per_question,
            'duration' => $request->duration,
        ];

        $exam = $this->model->create($data);
        return redirect(route('instructor.exam.question', [$exam->uuid]));
    }


    public function edit($uuid)
    {
        $data['navCourseActiveClass'] = 'active';
        $data['exam'] = $this->model->getRecordByUuid($uuid);
        return view('instructor.course.exam.edit', $data);
    }


    public function update(Request $request, $uuid)
    {
        $data = [
            'name' => $request->name,
            'marks_per_question' => $request->marks_per_question,
            'duration' => $request->duration,
            'type' => $request->type
        ];
        $exam = $this->model->updateByUuid($data, $uuid);

        toastrMessage('success', 'Quiz has been updated');
        return redirect()->back();
    }

    public function view($uuid)
    {
        $data['exam'] = $this->model->getRecordByUuid($uuid);
        if ($data['exam']->type == 'true_false') {
            return view('instructor.course.exam.view-true-false', $data);
        } else {
            return view('instructor.course.exam.view-multiple-choice', $data);
        }

    }


    public function delete($uuid)
    {
        $exam = $this->model->getRecordByUuid($uuid);
        foreach ($exam->questions as $question) {
            QuestionOption::where('question_id', $question->id)->delete();
            $question->delete();
        }
        $exam->delete();

        toastrMessage('error', 'Quiz has been deleted');
        return redirect()->back();
    }


    public function question($uuid)
    {
        $data['exam'] = $this->model->getRecordByUuid($uuid);

        return view('instructor.course.exam.question.createMultipleChoice', $data);

    }


    public function saveMcqQuestion(Request $request, $uuid)
    {
        $exam = $this->model->getRecordByUuid($uuid);

        $question = new Question();
        $question->name = $request->name;
        $question->exam_id = $exam->id;
        $question->save();

        /** save option  */

        foreach ($request->options as $key => $option)
        {

            $question_option = new QuestionOption();
            $question_option->question_id = $question->id;
            $question_option->name = $option;
            if ($key == $request->is_correct_answer[0])
            {
                $question_option->is_correct_answer = 'yes';
            }
            $question_option->save();
        }


        switch ($request) {
            case $request->has('save_and_add'):
                toastrMessage('success', 'Question has been saved');
                return redirect(route('exam.question', [$exam->uuid]));
                break;
            default :
                toastrMessage('success', 'Question has been saved');
                return redirect()->route('exam.view', [$exam->uuid]);
        }

    }

}
