<?php

namespace App\Http\Controllers\API;

use App\Application;
use App\Configuration;
use App\County;
use App\Evidence;
use App\Family;
use App\File;
use App\Geographical;
use App\Institution;
use App\MoreEvidence;
use App\MoreFamily;
use App\Sibling;
use App\Ward;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScholarshipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        if (auth()->user()->role == "sub-admin") {
            return Application::where('bursary_type', "scholarship")->where('year', date('Y'))->where('ward_id', auth()->user()->ward)->latest()->get();
        } elseif (auth()->user()->role == "official") {
            return Application::where('bursary_type', "scholarship")->where('year', date('Y'))->where('county', auth()->user()->county)->latest()->get();
        }
    }

    public function recommendedApp()
    {
        return Application::where('bursary_type', "scholarship")->where('year', date('Y'))->where('status', 1)->where('ward_id', auth()->user()->ward)->latest()->paginate(10);
    }
    public function conf()
    {
        if (auth()->user()->role == 'sub-admin' || auth()->user()->role == 'official' || auth()->user()->role == 'sub-official') {
            return Configuration::latest()->where('type', 1)->get();
        } else {
            return response()->json([
                'message' => 'unauthorised'
            ], 401);
        }
    }
    public function rejectedApp()
    {
        return Application::where('bursary_type', "scholarship")->where('year', date('Y'))->where('status', 2)->where('ward_id', auth()->user()->ward)->latest()->paginate(10);
    }

    public function getFiles($applicationId)
    {
        return File::where('applicationId', $applicationId)->get();
    }

    public function downloadFile($id)
    {
        $file = File::where('id', $id)->firstOrFail();
        $pathToFile = storage_path('app/' . $file->path);

        return response()->download($pathToFile);
    }

    public function show($applicationId)
    {
        $app = Application::where('id', $applicationId)->where('year', date('Y'))->first();
        $family = Family::where('applicationId', $applicationId)->where('year', date('Y'))->get();
        $evidence = Evidence::where('applicationId', $applicationId)->where('year', date('Y'))->first();
        $moreEvidence = MoreEvidence::where('applicationId', $applicationId)->where('year', date('Y'))->get();
        $siblings = Sibling::where('applicationId', $applicationId)->where('year', date('Y'))->get();


        $County = County::where('id', $app['county'])->value('name');
        $Ward = Ward::where('id', $app['ward_id'])->value('name');

        $application = array(
            'County' => $County,
            'Ward' => $Ward,
            'app' => $app

        );
        if (auth()->user()->role == 'sub-admin' && auth()->user()->ward == $app['ward_id']) {
            return ['application' => $application, 'family' => $family, 'evidence' => $evidence, 'moreEvidence' => $moreEvidence, 'siblings' => $siblings];
        }
        if (auth()->user()->role == 'official' && auth()->user()->county == $app['county']) {
            return ['application' => $application, 'family' => $family, 'evidence' => $evidence, 'moreEvidence' => $moreEvidence, 'siblings' => $siblings];
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'yearz' => 'required',
            'type' => 'required|string',
            'firstName' => 'required|string',
            'middleName' => 'required|string',
            'lastName' => 'required|string',
            'dob' => 'required|date',
            'parentName' => 'required|string',
            'box' => 'required|string',
            'gender' => 'required|string',
            'telephone' => 'required|phone:KE|min:10',
            'alt_telephone' => 'required|phone:KE|min:10',
            'county' => 'required',
            'ward' => 'required',
            'subcounty' => 'required|string',
            'location' => 'required|string',
            'sublocation' => 'required|string',
            'kcpeMarks' => 'required|integer|min:0|max:600',
            'indexNo' => 'required|string',
            'kcpeYear' => 'required|max:' . (date('Y')),
            'kcpeQuiz' => 'required|string',
            'repeatQuiz' => 'required|string',
            'secSchoolName' => 'required|string',
            'classification' => 'required|string',
            'fatherFirstName' => 'required|string',
            'fatherMiddleName' => 'required|string',
            'fatherLastName' => 'required|string',
            'motherFirstName' => 'required|string',
            'motherMiddleName' => 'required|string',
            'motherLastName' => 'required|string',
            'guardianFirstName' => 'required|string',
            'guardianMiddleName' => 'required|string',
            'guardianLastName' => 'required|string',
            'fatherIdNo' => 'required|string',
            'motherIdNo' => 'required|string',
            'guardianIdNo' => 'required|string',
            'fatherOccupation' => 'required|string',
            'motherOccupation' => 'required|string',
            'guardianOccupation' => 'required|string',
            'fliving' => 'required|string',
            'mliving' => 'required|string',
            'ftelephone' => 'required|phone:KE|min:10',
            'mtelephone' => 'required|phone:KE|min:10',
            'gtelephone' => 'required|phone:KE|min:10',
            'alt_ftelephone' => 'required|phone:KE|min:10',
            'alt_mtelephone' => 'required|phone:KE|min:10',
            'alt_gtelephone' => 'required|phone:KE|min:10',
            'fbox' => 'required|string',
            'mbox' => 'required|string',
            'gbox' => 'required|string',
            'relationship' => 'required|string',
            'gcounty' => 'required|string',
            'gward' => 'required|string',
            'gsubcounty' => 'required|string',
            'glocation' => 'required|string',
            'gsublocation' => 'required|string',
            'inheritance' => 'required|string',
            'whyApply' => 'required|string',
            'finSupport' => 'required|string',
            'specialNeeds' => 'required|string',
            'otherSpecialNeeds' => 'required|string',
            'fOrGAge' => 'required|integer',
            'mOrGAge' => 'required|integer',
            'fOrGDisability' => 'required|string',
            'mOrGDisability' => 'required|string',
            'fOrGAilment' => 'required|string',
            'mOrGAilment' => 'required|string',
            'fOrGAbandon' => 'required|string',
            'mOrGAbandon' => 'required|string',
            'fOrGEmployment' => 'required|string',
            'mOrGEmployment' => 'required|string',
            'fOrGBusiness' => 'required|string',
            'mOrGBusiness' => 'required|string',
            'fOrGLand' => 'required|string',
            'mOrGLand' => 'required|string',
            'fOrGAssets' => 'required|string',
            'mOrGAssets' => 'required|string',
            'familyConflict' => 'required|string',
            'familyHouse' => 'required|string',
            'otherDis' => 'required|string',
            'siblingsInfo' => 'required|string',
            'hear' => 'required|string',
        ]);

        $check = Application::where('user_id', auth()->user()->id)->where('year', $request->yearz)->where('bursary_type', $request->type)->get();
        if (count($check) > 0) {
            return response()->json([
                'status' => 'error',
                'msg' => 'You already sent an application',
            ], 422);
        } else {
            return \DB::transaction(function () use ($request) {
                $user = auth()->user()->id;
                $application = new Application();
                $application->user_id = auth()->user()->id;
                $application->bursary_type = $request->type;
                $application->application_year = $request->yearz;
                $application->firstName = $request->firstName;
                $application->middleName = $request->middleName;
                $application->lastName = $request->lastName;
                $application->dob = $request->dob;
                $application->parentName = $request->parentName;
                $application->box = $request->box;
                $application->status = 0;
                $application->gender = $request->gender;
                $application->tel = $request->telephone;
                $application->alt_tel = $request->alt_telephone;
                $application->county = $request->county;
                $application->ward_id = $request->ward;
                $application->subcounty = $request->subcounty;
                $application->location = $request->location;
                $application->sublocation = $request->sublocation;
                $application->kcpeMarks = $request->kcpeMarks;
                $application->indexNo = $request->indexNo;
                $application->year = date('Y');
                $application->application_year = $request->yearz;
                $application->resultslip = $request->resultslip;
                $application->kcpeYear = $request->kcpeYear;
                $application->kcpeQuiz = $request->kcpeQuiz;
                $application->repeatQuiz = $request->repeatQuiz;
                $application->secSchoolName = $request->secSchoolName;
                $application->classification = $request->classification;
                $serial = auth('api')->user()->id . time();
                $application->serial = str_pad($serial, 4, '0', STR_PAD_LEFT);
                $application->save();

                $applicationId = $application->id;

                $father = new Family();
                $father->user_id = auth()->user()->id;
                $father->status = 0;
                $father->who = "Father";
                $father->year = date('Y');
                $father->applicationId = $applicationId;
                $father->firstName = $request->fatherFirstName;
                $father->middleName = $request->fatherMiddleName;
                $father->lastName = $request->fatherLastName;
                $father->idNumber = $request->fatherIdNo;
                $father->living = $request->fliving;
                $father->cert = $request->fatherId;
                $father->occupation = $request->fatherOccupation;
                $father->tel = $request->ftelephone;
                $father->alt_tel = $request->alt_ftelephone;
                $father->box = $request->fbox;
                $father->save();

                $mother = new Family();
                $mother->user_id = auth()->user()->id;
                $mother->who = "Mother";
                $mother->status = 0;
                $mother->year = date('Y');
                $mother->applicationId = $applicationId;
                $mother->firstName = $request->motherFirstName;
                $mother->middleName = $request->motherMiddleName;
                $mother->lastName = $request->motherLastName;
                $mother->idNumber = $request->motherIdNo;
                $mother->living = $request->mliving;
                $mother->cert = $request->motherId;
                $mother->occupation = $request->motherOccupation;
                $mother->tel = $request->mtelephone;
                $mother->alt_tel = $request->alt_mtelephone;
                $mother->box = $request->mbox;
                $mother->save();

                $guardian = new Family();
                $guardian->user_id = auth()->user()->id;
                $guardian->who = "Guardian";
                $guardian->status = 0;
                $guardian->year = date('Y');
                $guardian->applicationId = $applicationId;
                $guardian->firstName = $request->guardianFirstName;
                $guardian->middleName = $request->guardianMiddleName;
                $guardian->lastName = $request->guardianLastName;
                $guardian->idNumber = $request->guardianIdNo;
                $guardian->G_relationship = $request->relationship;
                $guardian->occupation = $request->guardianOccupation;
                $guardian->tel = $request->gtelephone;
                $guardian->alt_tel = $request->alt_gtelephone;
                $guardian->box = $request->gbox;
                $guardian->county = $request->gcounty;
                $guardian->ward = $request->gward;
                $guardian->subcounty = $request->gsubcounty;
                $guardian->location = $request->glocation;
                $guardian->sublocation = $request->gsublocation;
                $guardian->save();

                $evidence = new Evidence();
                $evidence->user_id = $user;
                $evidence->inheritance = $request->inheritance;
                $evidence->whyApply = $request->whyApply;
                $evidence->finSupport = $request->finSupport;
                $evidence->specialNeeds = $request->specialNeeds;
                $evidence->otherSpecialNeeds = $request->otherSpecialNeeds;
                $evidence->familyConflict = $request->familyConflict;
                $evidence->familyHouse = $request->familyHouse;
                $evidence->otherDisabilities = $request->otherDis;
                $evidence->siblingsInfo = $request->siblingsInfo;
                $evidence->hear = $request->hear;
                $evidence->hearDetails = $request->hearDetails;
                $evidence->status = 0;
                $evidence->applicationId = $applicationId;
                $evidence->year = date('Y');
                $evidence->save();

                $males = new MoreEvidence();
                $males->user_id = $user;
                $males->who = "Father/Male Guardian";
                $males->age = $request->fOrGAge;
                $males->disability = $request->fOrGDisability;
                $males->ailment = $request->fOrGAilment;
                $males->abandon = $request->fOrGAbandon;
                $males->employment = $request->fOrGEmployment;
                $males->business = $request->fOrGBusiness;
                $males->land = $request->fOrGLand;
                $males->assets = $request->fOrGAssets;
                $males->status = 0;
                $males->applicationId = $applicationId;
                $males->year = date('Y');
                $males->save();

                $females = new MoreEvidence();
                $females->user_id = $user;
                $females->who = "Mother/Female Guardian";
                $females->age = $request->mOrGAge;
                $females->disability = $request->mOrGDisability;
                $females->ailment = $request->mOrGAilment;
                $females->abandon = $request->mOrGAbandon;
                $females->employment = $request->mOrGEmployment;
                $females->business = $request->mOrGBusiness;
                $females->land = $request->mOrGLand;
                $females->assets = $request->mOrGAssets;
                $females->status = 0;
                $females->applicationId = $applicationId;
                $females->year = date('Y');
                $females->save();


                if ($request->firstSibName) {
                    $first = new Sibling();
                    $first->user_id = $user;
                    $first->name = $request->firstSibName;
                    $first->age = $request->firstSibAge;
                    $first->schoolOrEmployer = $request->firstSibSchoolOrEmployer;
                    $first->classOrSalary = $request->firstSibClassOrSalary;
                    $first->others = $request->firstSibOthers;
                    $first->status = 0;
                    $first->applicationId = $applicationId;
                    $first->year = date('Y');
                    $first->save();
                }

                if ($request->secondSibName) {
                    $second = new Sibling();
                    $second->user_id = $user;
                    $second->name = $request->secondSibName;
                    $second->age = $request->secondSibAge;
                    $second->schoolOrEmployer = $request->secondSibSchoolOrEmployer;
                    $second->classOrSalary = $request->secondSibClassOrSalary;
                    $second->others = $request->secondSibOthers;
                    $second->status = 0;
                    $second->applicationId = $applicationId;
                    $second->year = date('Y');
                    $second->save();
                }

                if ($request->thirdSibName) {
                    $third = new Sibling();
                    $third->user_id = $user;
                    $third->name = $request->thirdSibName;
                    $third->age = $request->thirdSibAge;
                    $third->schoolOrEmployer = $request->thirdSibSchoolOrEmployer;
                    $third->classOrSalary = $request->thirdSibClassOrSalary;
                    $third->others = $request->thirdSibOthers;
                    $third->status = 0;
                    $third->applicationId = $applicationId;
                    $third->year = date('Y');
                    $third->save();
                }

                if ($request->forthSibName) {
                    $forth = new Sibling();
                    $forth->user_id = $user;
                    $forth->name = $request->forthSibName;
                    $forth->age = $request->forthSibAge;
                    $forth->schoolOrEmployer = $request->forthSibSchoolOrEmployer;
                    $forth->classOrSalary = $request->forthSibClassOrSalary;
                    $forth->others = $request->forthSibOthers;
                    $forth->status = 0;
                    $forth->applicationId = $applicationId;
                    $forth->year = date('Y');
                    $forth->save();
                }

                if ($request->fifthSibName) {
                    $fifth = new Sibling();
                    $fifth->user_id = $user;
                    $fifth->name = $request->fifthSibName;
                    $fifth->age = $request->fifthSibAge;
                    $fifth->schoolOrEmployer = $request->fifthSibSchoolOrEmployer;
                    $fifth->classOrSalary = $request->fifthSibClassOrSalary;
                    $fifth->others = $request->fifthSibOthers;
                    $fifth->status = 0;
                    $fifth->applicationId = $applicationId;
                    $fifth->year = date('Y');
                    $fifth->save();
                }

                if ($request->sixthSibName) {
                    $sixth = new Sibling();
                    $sixth->user_id = $user;
                    $sixth->name = $request->sixthSibName;
                    $sixth->age = $request->sixthSibAge;
                    $sixth->schoolOrEmployer = $request->sixthSibSchoolOrEmployer;
                    $sixth->classOrSalary = $request->sixthSibClassOrSalary;
                    $sixth->others = $request->sixthSibOthers;
                    $sixth->status = 0;
                    $sixth->applicationId = $applicationId;
                    $sixth->year = date('Y');
                    $sixth->save();
                }

                return $applicationId;
            });
        }
    }

    public function recommend(Request $request, $applicationId)
    {
        if ($request->recommendation == 1) {
            $app = Application::findOrFail($applicationId);
            $app->status = 1;
            $app->recommendation = "high";
            $app->update();
        } elseif ($request->recommendation == 2) {
            $app = Application::findOrFail($applicationId);
            $app->status = 1;
            $app->recommendation = "partially";
            $app->update();
        } elseif ($request->recommendation == 3) {
            $app = Application::findOrFail($applicationId);
            $app->status = 2;
            $app->recommendation = "no";
            $app->update();
        }
    }
    public function reject(Request $request, $applicationId)
    {

            $app = Application::findOrFail($applicationId);
            $app->status = 2;
            $app->update();

    }
    public function approve($applicationId)
    {
        $app = Application::findOrFail($applicationId);
        $app->approved = 3;
        $app->update();
    }

    public function complete(Request $request)
    {
        if ($request->hasFile('slip')) {
            foreach ($request->file('slip') as $uploadedFile) {
                $ext = $uploadedFile->getClientOriginalExtension();
                if (in_array($ext, ['jpg', 'png', 'jpeg', 'pdf', 'docx'])) {
                    $filename = $uploadedFile->storeAs('uploads', time() . $uploadedFile->getClientOriginalName());
                    $file = new File();
                    $file->kind = "Result Slip";
                    $file->applicationId = $request->applicationId;
                    $file->path = $filename;
                    $file->status = 0;
                    $file->type = "scholarship";
                    $file->year = date('Y');
                    $file->save();
                }
            }
        }

        if ($request->hasFile('motherId')) {
            foreach ($request->file('motherId') as $uploadedFile) {
                $ext = $uploadedFile->getClientOriginalExtension();
                if (in_array($ext, ['jpg', 'png', 'jpeg', 'pdf', 'docx'])) {
                    $filename = $uploadedFile->storeAs('uploads', time() . $uploadedFile->getClientOriginalName());
                    $file = new File();
                    $file->kind = "Mother’s ID/Death Cert";
                    $file->applicationId = $request->applicationId;
                    $file->path = $filename;
                    $file->status = 0;
                    $file->type = "scholarship";
                    $file->year = date('Y');
                    $file->save();
                }
            }
        }

        if ($request->hasFile('fatherId')) {
            foreach ($request->file('fatherId') as $uploadedFile) {
                $ext = $uploadedFile->getClientOriginalExtension();
                if (in_array($ext, ['jpg', 'png', 'jpeg', 'pdf', 'docx'])) {
                    $filename = $uploadedFile->storeAs('uploads', time() . $uploadedFile->getClientOriginalName());
                    $file = new File();
                    $file->kind = "Father’s ID/Death Cert";
                    $file->applicationId = $request->applicationId;
                    $file->path = $filename;
                    $file->status = 0;
                    $file->type = "scholarship";
                    $file->year = date('Y');
                    $file->save();
                }
            }
        }

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $uploadedFile) {
                $ext = $uploadedFile->getClientOriginalExtension();
                if (in_array($ext, ['jpg', 'png', 'jpeg', 'pdf', 'docx'])) {
                    $filename = $uploadedFile->storeAs('uploads', time() . $uploadedFile->getClientOriginalName());
                    $file = new File();
                    $file->kind = "Other";
                    $file->applicationId = $request->applicationId;
                    $file->path = $filename;
                    $file->status = 0;
                    $file->type = "scholarship";
                    $file->year = date('Y');
                    $file->save();
                }
            }
        }
        return response(['status' => 'success'], 200);
    }

    public function uploadLetter(Request $request)
    {

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $uploadedFile) {
                $filename = $uploadedFile->store('uploads');
                // echo $filename;
                $file = new File();
                $file->applicationId = $request->applicationId;
                $file->path = $filename;
                $file->status = 0;
                $file->type = "county";
                $file->year = date('Y');
                $file->save();
            }
        }
        return response(['status' => 'success'], 200);
    }
}
