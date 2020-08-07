<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Resources\Contact as ContactResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactsController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny',Contact::class);
//        return \request()->user()->contacts;
        return ContactResource::collection(request()->user()->contacts);
    }
    public function store()
    {
        $this->authorize('create',Contact::class);
        $contact=request()->user()->contacts()->create($this->validateData());
        return (new ContactResource($contact))->response()->setStatusCode(201);
    }

    public function show(Contact $contact)
    {
        $this->authorize('view', $contact);
        return new ContactResource($contact);
    }
    public function update(Contact $contact)
    {
        $this->authorize('update', $contact);

        $contact->update($this->validateData());

        return (new ContactResource($contact))->response()->setStatusCode(201);
    }
    public function destroy(Contact $contact)
    {
        $this->authorize('delete', $contact);
        $contact->delete();
        return response([],Response::HTTP_NO_CONTENT);
    }

    public function validateData()
    {
        $data = \request()->validate([
            'name'=>'required',
            'email'=>'required|email',
            'birthday'=>'required',
            'company'=>'required',
        ]);
        return $data;
    }
}
