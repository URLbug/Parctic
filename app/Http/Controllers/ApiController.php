<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    function index(Request $request): JsonResponse
    {
        $params = $request->all();

        $limit = $params['limit'] ?? 500;
        $student = $params['student'] ?? null;

        $data = Student::limit($limit);

        if(isset($student))
        {
            $data = $data->where('id', $student);
        }

        $data = $data->paginate(
            null,
            [
                'firstName',
                'lastName',
                'email',
                'password',
            ]
        )->toArray();

        return response()->json($data['data']);
    }
}
