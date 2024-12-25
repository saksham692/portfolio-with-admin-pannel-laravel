<?php

use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SkillItemController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\FooterInfoController;
use App\Http\Controllers\Admin\SeoSettingController;
use App\Http\Controllers\Admin\TyperTitleController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\FooterHelpLinkController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\FooterSocialLinkController;
use App\Http\Controllers\Admin\FooterUsefulLinkController;
use App\Http\Controllers\Admin\FooterContactInfoController;
use App\Http\Controllers\Admin\BlogSectionSettingController;
use App\Http\Controllers\Admin\SkillSectionSettingController;
use App\Http\Controllers\Admin\ContactSectionSettingController;
use App\Http\Controllers\Admin\FeedbackSectionSettingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/** Frontend Routes */
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('blogs/{category?}', [\App\Http\Controllers\Frontend\BlogController::class, 'index'])->name('frontend.blogs.index');
Route::get('blog/{slug}', [\App\Http\Controllers\Frontend\BlogController::class, 'show'])->name('show.blog');

/** Contact Page Route */
Route::get('contact', [HomeController::class, 'contactView'])->name('frontend.contact');
Route::post('contact', [HomeController::class, 'contact'])->name('contact');

/** Service Page Route */
Route::get('services', [HomeController::class, 'services'])->name('frontend.services');
Route::get('service/{slug}', [ServiceController::class, 'show'])->name('service.detail');

/** Service Page Route */
Route::get('projects', [HomeController::class, 'projects'])->name('frontend.projects');
Route::get('project/{slug}', [ProjectController::class, 'show'])->name('project.detail');

/** Resume Page Route */
Route::get('resume', [HomeController::class, 'resume'])->name('frontend.resume');

/** Resume Page Route */
Route::get('about', [HomeController::class, 'about'])->name('frontend.about');

/** Web Page Route */
Route::get('page/{slug}', [PageController::class, 'show'])->name('page.show');

/** Admin Routes */

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    /** Hero Route */
    Route::resource('hero', HeroController::class);
    Route::resource('typer-title', TyperTitleController::class);

    // ** Service Route */
    Route::resource('service', ServiceController::class)->except('show');

    // ** Project Route */
    Route::resource('project', ProjectController::class);

    /** About Route */
    Route::get('resume/download', [AboutController::class, 'resumeDownload'])->name('resume.download');
    Route::resource('about', AboutController::class);

    /** Skill Section Setting Route */
    Route::resource('skill-section-setting', SkillSectionSettingController::class);

    /** Skill Items Route */
    Route::resource('skill-item', SkillItemController::class);

    /** Skill Items Route */
    Route::resource('page', PageController::class)->except('show');

    /** Experience Route */
    Route::resource('experience', ExperienceController::class);

    /** Education Routes */
    Route::resource('education', EducationController::class);

    /** Feedback Route */
    Route::resource('feedback', FeedbackController::class);

    /** Feedback Section Setting Route */
    Route::resource('feedback-section-setting', FeedbackSectionSettingController::class);

    /** Blog Category Route */
    Route::resource('blog-category', BlogCategoryController::class);

    /** Blog Route */
    Route::resource('blog', BlogController::class);

    /** Blog Section Setting Route */
    Route::resource('blog-section-setting', BlogSectionSettingController::class);

    /** Contact Section Setting Route */
    Route::resource('contact-section-setting', ContactSectionSettingController::class);

    /** Footer Social Route */
    Route::resource('footer-social', FooterSocialLinkController::class);

    /** Footer Info Route */
    Route::resource('footer-info', FooterInfoController::class);

    /** Footer Contact Info Route */
    Route::resource('footer-contact-info', FooterContactInfoController::class);

    /** Footer Useful Links Route */
    Route::resource('footer-useful-links', FooterUsefulLinkController::class);

    /** Footer Help Links Route */
    Route::resource('footer-help-links', FooterHelpLinkController::class);

    /** Settings Route */
    Route::get('settings', SettingController::class)->name('settings.index');

    /** General setting Route */
    Route::resource('general-setting', GeneralSettingController::class);

    /** Seo setting Route */
    Route::resource('seo-setting', SeoSettingController::class);
});
