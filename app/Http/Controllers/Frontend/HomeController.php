<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Education;
use App\Models\Hero;
use App\Models\About;
use App\Models\Project;
use App\Models\Service;
use App\Models\Category;
use App\Models\Feedback;
use App\Mail\ContactMail;
use App\Models\SkillItem;
use App\Models\Experience;
use App\Models\TyperTitle;
use Illuminate\Http\Request;
use App\Models\PortfolioItem;
use App\Models\BlogSectionSetting;
use App\Models\SkillSectionSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactSectionSetting;
use App\Models\FeedbackSectionSetting;
use App\Models\PortfolioSectionSetting;

class HomeController extends Controller
{
    public function index()
    {
        $hero = Hero::first();
        $typerTitles = TyperTitle::get()->pluck('title')->toArray();
        $services = Service::orderBy('created_at', 'asc')->take(6)->get();
        $projects = Project::orderBy('created_at', 'asc')->take(6)->get();
        $about = About::first();
        $skill = SkillSectionSetting::first();
        $skillItems = SkillItem::all();
        $experiences = Experience::orderBy('start_year', 'asc')->get();
        $educations = Education::orderBy('start_year', 'asc')->get();
        $feedbacks = Feedback::all();
        $feedbackTitle = FeedbackSectionSetting::first();
        $blogs = Blog::where('published', 1)->latest()->take(3)->get();
        $blogSectionTitle = BlogSectionSetting::first();
        $contactSection = ContactSectionSetting::first();
        return view('frontend.pages.home', compact('hero', 'typerTitles', 'services', 'projects', 'about', 'skill', 'skillItems', 'experiences', 'educations', 'feedbacks', 'feedbackTitle', 'blogs', 'blogSectionTitle', 'contactSection'));
    }

    public function contactView()
    {
        $contactSection = ContactSectionSetting::first();
        return view('frontend.pages.contact', compact('contactSection'));
    }

    public function contact(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:200'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'max:300'],
            'message' => ['required', 'max:2000'],
        ]);
        $mailData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
        ];
        Mail::send(new ContactMail($mailData));

        return response(['status' => 'success', 'message' => 'Mail Sended Successfully!']);

    }

    /** About Page Function */
    public function about(Request $request)
    {
        $about = About::first();
        return view('frontend.pages.about.index', compact('about'));
    }

    /** Services Page Function */
    public function services(Request $request)
    {
        $services = Service::orderBy('created_at', 'asc')->get();
        return view('frontend.pages.service.index', compact('services'));
    }

    /** Services Page Function */
    public function projects(Request $request)
    {
        $projects = Project::orderBy('created_at', 'asc')->get();
        return view('frontend.pages.project.index', compact('projects'));
    }

    /** Resume Page Function */
    public function resume(Request $request)
    {
        $about = About::first();
        return view('frontend.pages.resume.index', compact('about'));
    }


}
