<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use App\Events\MessageSent;

use App\Http\Requests;
use App\Http\Requests\CreateContactRequest;
use App\ContactMessage;

class ContactController extends Controller
{
    public function getContactIndex(){
    	return view('frontend.other.contact');
    }

    public function postSendMessage(CreateContactRequest $request){

    	$contact = new ContactMessage();
    	$contact->sender = $request['name'];
    	$contact->email = $request['email'];
    	$contact->subject = $request['subject'];
    	$contact->body = $request['message'];
    	$contact->save();
        Event::fire(new MessageSent($contact));
    	return redirect()->route('contact')->with(['success' => 'Message Sent']);

    }

    public function getContactMessages(){
        $contact = ContactMessage::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.other.contact_message', compact('contact'));
    }

    public function getSingleContactMessages($contact_id){
        $contact = ContactMessage::find($contact_id);
        if(!$contact){
            return redirect()->route('admin.blog.contact-messages')->with(['error' => 'Contact Message Deleted']);
        }
        return view('admin.other.single_contact_message', compact('contact'));
    }

    public function getContactMessageDelete($contact_id){
        $contact = ContactMessage::find($contact_id);
        if(!$contact){
            return redirect()->route('admin.blog.contact-messages')->with(['error' => 'Contact Message Deleted']);
        }
        $contact->delete();
        return redirect()->route('admin.index')->with(['success' => 'Contact Message Deleted']);
    }

}
