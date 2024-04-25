<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Models\User;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function validateNIT(DocumentRequest $request)
    {
        // Optimize the following code
        if (!$this->checkDocumentFormat($request->nit)) {
            $this->process();
            $message = 'Formato de NIT incorrecto.';
        }

        if (!$this->checkDocumentOnlyDigits($request->nit)) {
            $this->process();
            $message = 'El NIT solo puede contener números.';
        }

        if (!$this->checkDocumentOwnership($request->nit)) {
            $this->process();
            $message = 'NIT no valido.';
        }

        return response()->json(['message' => $message]);
        // End of the optimized code
    }

    // Do not change the following methods
    private function checkDocumentOwnership($value)
    {
        $user = User::whereNit($value)->first();

        if (!$user) {
            return false;
        }

        return true;
    }

    // Do not change the following methods
    private function checkDocumentFormat($value)
    {
        if (strlen($value) != 14) {
            return false;
        }

        return true;
    }

    // Do not change the following methods
    private function checkDocumentOnlyDigits($value)
    {
        $nit = $value;
        $nit = str_replace('-', '', $nit);

        if (!ctype_digit($nit)) {
            return false;
        }

        return true;
    }


    // Do not change the following methods
    private function process()
    {
        // sleep(5);
    }
}
