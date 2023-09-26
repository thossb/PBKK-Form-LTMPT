<?php
//
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\Student; // Import the Student model

class FormController extends Controller
{
    public function formulir(){
        return view('form');
    }

    public function show(Request $request){
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required|email:rfc',
            'password' => ['required', Password::min(8)->mixedCase()->numbers()],
            'nilairapot' => 'required|numeric|between:2.50,99.99',
            'nomor_telepon' => 'required|numeric',
            'image' => 'required|max:2048|mimes:jpg,jpeg,png'
        ]);
    
        // Store data in the "students" table
        $student = new Student();
        $student->nama = $request->nama;
        $student->email = $request->email;
        $student->password = bcrypt($request->password); // Hash the password
        $student->nilairapot = $request->nilairapot;
        $student->nomor_telepon = $request->nomor_telepon;
        $student->image = $request->image->getClientOriginalName();
        $student->save();
    
        // Store the results in the session
        $results = [
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password,
            'nilairapot' => $request->nilairapot,
            'nomor_telepon' => $request->nomor_telepon,
            'image' => $request->image->getClientOriginalName()
        ];
    
        return redirect('/result')->with(['results' => $results, 'status' => 'Submitted!']);
    }

    public function result(){
        $results = session()->get('results');
        
        // Retrieve the student data from the database
        $student = Student::where('email', $results['email'])->first();
        
        return view('result', ['results' => $results, 'student' => $student]);
    }

    public function admin()
    {
        $students = Student::all();
        return view('admin', ['students' => $students]);
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('edit', ['student' => $student]);
    }

    public function delete($id)
    {
        $student = Student::find($id);
        if ($student) {
            $student->delete();
            return redirect('/admin')->with('success', 'Data berhasil dihapus.');
        }
        return redirect('/admin')->with('error', 'Data tidak ditemukan.');
    } 
    
    public function update(Request $request, $id)
{
    $data = $request->validate([
        'nama' => 'required',
        'email' => 'required|email:rfc',
        'nilairapot' => 'required|numeric|between:2.50,99.99',
        'nomor_telepon' => 'required|numeric',
        // Add validation rules for other fields if needed
    ]);

    $student = Student::find($id);

    if (!$student) {
        return redirect('/admin')->with('error', 'Data tidak ditemukan.');
    }

    $student->update([
        'nama' => $request->nama,
        'email' => $request->email,
        'nilairapot' => $request->nilairapot,
        'nomor_telepon' => $request->nomor_telepon,
        // Update other fields here
    ]);

    return redirect('/admin')->with('status', 'Data telah diperbarui.');
}


}
