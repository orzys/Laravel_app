<?php

namespace App\Http\Controllers;
use App\student;
use App\Http\Controller\Redirect;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function createStudent()
    {
        return view('createStudent');
    }

    public function storeStudent(Request $request)
    {
        $student = new Student;

        $student->imie = $request->input('studentImie');
        $student->nazwisko = $request->input('studentNazwisko');
        $student->data_urodzenia = $request->input('studentDataUrodzenia');
        $student->wiek = $request->input('studentWiek');
        $student->klasa = $request->input('studentKlasa');
        $student->plec = $request->input('studentPlec');
        $student->ocena = $request->input('studentOcena');
        $student->pesel = $request->input('studentPesel');
        $student->save();

        return redirect()->route('showStudents');
    }

    public function updateStudent($id)
    {
        $student = Student::find($id);
        return view('updateStudent')->with('student',$student);
    }

    public function storeUpdateStudent(Request $request, $id)
    {
        $student = Student::find($id);

        $student->imie = $request->input('studentImie');
        $student->nazwisko = $request->input('studentNazwisko');
        $student->data_urodzenia = $request->input('studentDataUrodzenia');
        $student->wiek = $request->input('studentWiek');
        $student->klasa = $request->input('studentKlasa');
        $student->plec = $request->input('studentPlec');
        $student->ocena = $request->input('studentOcena');
        $student->pesel = $request->input('studentPesel');
        $student->save();

        return redirect()->route('showStudents');
    }
 
    public function deleteStudent($id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect()->route('showStudents')->with('message', 'Usunięto studenta!');
        //return view ( 'student' )->withMessage ( 'Brak studentów spełniających podane kryteria!' );
    }

    public function showStudents()
    {
        $student = Student::all();
        return view('student')->with('student',$student);
    }
}

