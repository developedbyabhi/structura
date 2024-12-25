<?php
namespace OrganizationalChart\Controllers;

use Illuminate\Http\Request;
use OrganizationalChart\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        // Retrieve all employees and organize them by their reporting structure
        $employees = Employee::with('subordinates')->get();

        // Prepare the hierarchical data for the chart
        $chartData = $this->buildHierarchy($employees);

        return view('organizationalchart::index', ['chartData' => $chartData]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'reports_to' => 'nullable|exists:employees,id',
        ]);

        Employee::create($validated);

        return redirect()->back();
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->back();
    }

    // Helper function to recursively build the hierarchy for the chart
    private function buildHierarchy($employees)
    {
        $employeeList = [];

        foreach ($employees as $employee) {
            if ($employee->reports_to) {
                $employeeList[$employee->reports_to][] = $employee->name;
            } else {
                $employeeList['root'][] = $employee->name;
            }
        }

        return $employeeList;
    }
}
