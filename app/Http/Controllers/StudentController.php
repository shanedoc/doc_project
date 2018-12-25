<?php
/**
 * Created by PhpStorm.
 * User: xuke
 * Date: 2018/9/18
 * Time: 14:00
 */
namespace App\Http\Controllers;


use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller{

    public function index(){
        //分页，每页两条
        $students = Student::paginate(5);

        return view('student.index',[
            'students'=>$students,
        ]);
    }

    //添加页面显示
    public function create(Request $request){
        $student = new Student();
        if($request->isMethod('POST')){
            $this->validate($request,[
                'Student.name' => 'required|min:2|max:20',
                'Student.sex' => 'required|integer',
                'Student.age' => 'required|integer',
            ]);

            $data = $request->input('Student');

            //需要设置批量赋值
            if(Student::create($data)){
                return redirect('student/index')->with('success','添加成功');
            }else{
                return redirect()->back()->with('error','添加失败');
            }


        }else{
            return view('student.create',[
                'student' => $student,
            ]);
        }

    }

    //新增
    public function save(Request $request){
        $data = $request->input('Student');
        var_dump($data);

        $student = new Student();
        $student->name = $data['name'];
        $student->sex = $data['sex'];
        $student->age = $data['age'];
        if($student->save()){
            return redirect('student/index');
        }else{
            //返回上一个请求页面
            return redirect()->back();
        }

    }

    //修改
    public function update(Request $request,$id){
        $student = Student::find($id);
        if($request->isMethod('POST')){
            $data = $request->input('Student');
            $student->name = $data['name'];
            $student->age = $data['age'];
            $student->sex = $data['sex'];
            if($student->save()){
                return redirect('student/index')->with('success',$id.'_修改成功');
            }


        }else{

        }

        return view('student.update',[
            'student'=>$student,
        ]);

    }










}