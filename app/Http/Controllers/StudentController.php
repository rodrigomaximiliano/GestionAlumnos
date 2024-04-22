<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Resources\ClassResource;
use App\Http\Resources\StudentResource;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    public function index()
    {
        $studentQuery = Student::query();

        $studentQuery = $this->applySearch($studentQuery, request('search'));

        return inertia('Student/Index', [
            'students' => StudentResource::collection(
                $studentQuery->paginate(5)
            ),
            'search' => request('search') ?? ''
        ]);
    }

    protected function applySearch(Builder $query, $search)
    {
        return $query->when($search, function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%');
        });
    }

    public function create()
    {
        $allowedClasses = ['PHP Laravel Vue', 'Node.js React.js', '.NET Angular'];
        
        // Filtrar las clases permitidas
        $classes = ClassResource::collection(Classes::whereIn('name', $allowedClasses)->get());

        return inertia('Student/Create', [
            'classes' => $classes
        ]);
    }

    public function store(StoreStudentRequest $request)
    {
        $request->validate([
            'class_id' => 'required|in:PHP Laravel Vue,Node.js React.js,.NET Angular',
            // Asegúrate de tener las reglas de validación necesarias para los otros campos
        ]);

        Student::create($request->validated());

        return redirect()->route('students.index');
    }

    public function edit(Student $student)
    {
        $allowedClasses = ['PHP Laravel Vue', 'Node.js React.js', '.NET Angular'];
        
        $classes = ClassResource::collection(Classes::whereIn('name', $allowedClasses)->get());

        // Obtener las secciones correspondientes a la clase del estudiante
        $sections = Section::where('class_id', $student->class_id)->get();

        return inertia('Student/Edit', [
            'student' => StudentResource::make($student),
            'classes' => $classes,
            'sections' => $sections
        ]);
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $request->validate([
            'class_id' => 'required|in:PHP Laravel Vue,Node.js React.js,.NET Angular',
            // Asegúrate de tener las reglas de validación necesarias para los otros campos
        ]);

        $student->update($request->validated());

        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index');
    }
}
