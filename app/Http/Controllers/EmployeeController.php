<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // dapatkan semua data
    public function index()
    {
        $employees = Employee::all();

        if ($employees->isEmpty()) {
            return response()->json([
                'message' => 'Data is empty',
            ], 404); // kode status 404 tidak ditemkukan
        }

        return response()->json([
            'message' => 'Get All Resource',
            'data' => $employees,
        ], 200); //kode status 200 berhasil
    }

    // tambahkan data employee
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'gender' => 'required|in:M,F',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:employees',
            'status' => 'required',
            'hired_on' => 'required|date',
        ]);

        $employee = Employee::create($validated);

        return response()->json([
            'message' => 'Resource is added successfully',
            'data' => $employee,
        ], 201); // kode status 201 berhasil tambah data
    }

    // dapatkan detail data
    public function show($id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json([
                'message' => 'Resource not found',
            ], 404); // kode status 404 tidak ditemukan
        }

        return response()->json([
            'message' => 'Get Detail Resource',
            'data' => $employee,
        ], 200); //kode status 200 berhasil
    }

    // mengedit data 
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json([
                'message' => 'Resource not found',
            ], 404); // kode status 404 tidak ditemukan
        }

        $employee->update($request->all());

        return response()->json([
            'message' => 'Resource is update successfully',
            'data' => $employee,
        ], 200); //kode status 200 berhasil
    }

    // hapus data
    public function destroy($id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json([
                'message' => 'Resource not found',
            ], 404); //kode status 404 tidak ditemukan
        }

        $employee->delete();

        return response()->json([
            'message' => 'Resource is delete successfully',
        ], 200); //kode status 200 berhasil
    }

    // mencari data employee dari nama
    public function search($name)
    {
        $employees = Employee::where('name', 'like', '%' . $name . '%')->get();

        if ($employees->isEmpty()) {
            return response()->json([
                'message' => 'Resource not found',
            ], 404); //kode status 404 tidak ditemukan
        }

        return response()->json([
            'message' => 'Get searched resource',
            'data' => $employees,
        ], 200); //kode status 200 berhasil
    }

    // dapatkan data epmloyee yang aktif
    public function active()
    {
        $activeEmployees = Employee::where('status', 'active')->get();

        return response()->json([
            'message' => 'Get active resource',
            'total' => $activeEmployees->count(),
            'data' => $activeEmployees,
        ], 200); //kode status 200 berhasil
    }

    // dapatkan data employee yang tidak aktif
    public function inactive()
    {
        $inactiveEmployees = Employee::where('status', 'inactive')->get();

        return response()->json([
            'message' => 'Get inactive resource',
            'total' => $inactiveEmployees->count(),
            'data' => $inactiveEmployees,
        ], 200); //kode status 200 berhasil
    }

    // dapatkan data employee yang terminated(dipecat)
    public function terminated()
    {
        $terminatedEmployees = Employee::where('status', 'terminated')->get();

        return response()->json([
            'message' => 'Get terminated resource',
            'total' => $terminatedEmployees->count(),
            'data' => $terminatedEmployees,
        ], 200); //kode status 200 berhasil
    }

}
