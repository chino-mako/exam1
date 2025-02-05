<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('name')) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'like', "%{$request->name}%")
                    ->orWhere('last_name', 'like', "%{$request->name}%");
            });
        }
        if ($request->filled('email')) {
            $query->where('email', 'like', "%{$request->email}%");
        }
        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }
        if ($request->filled('content')) {
            $query->where('content', $request->content);
        }
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->paginate(7);

        return view('admin', compact('contacts'));
    }

    public function export()
    {
        $response = new StreamedResponse(function () {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['お名前', '性別', 'メールアドレス', 'お問い合わせの種類', 'お問い合わせ内容']);

            $contacts = Contact::all();
            foreach ($contacts as $contact) {
                fputcsv($handle, [
                    $contact->first_name . ' ' . $contact->last_name,
                    $contact->gender === 'male' ? '男性' : ($contact->gender === 'female' ? '女性' : 'その他'),
                    $contact->email,
                    $contact->content,
                    $contact->detail
                ]);
            }

            fclose($handle);
        });
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="contacts.csv"');

        return $response;
    }
}
