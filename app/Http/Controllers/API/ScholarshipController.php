<?php

namespace App\Http\Controllers\API;

use App\Application;
use App\Evidence;
use App\Family;
use App\File;
use App\MoreEvidence;
use App\Sibling;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScholarshipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function store(Request $request)
    {
        $check = Application::where('user_id', auth()->user()->id)->where('year', date('Y'))->where('bursary_type', $request->type)->get();
        if (count($check) > 0) {
            return response()->json([
                'status' => 'error',
                'msg' => 'You already sent an application',
            ], 422);
        } else {
            $application = new Application();
            $application->user_id = auth()->user()->id;
            $application->bursary_type = $request->type;
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


            return $applicationId;


        }
    }

    public function complete(Request $request)
    {
        if ($request->siblings) {
            $siblings = $request->siblings;

            dd($request->siblings);

//            foreach ($request->siblings as $key => $sibling) {
//                $sib = new Sibling();
//                $sib->name = $sibling->name;
//                $sib->age = $sibling->age;
//                $sib->schoolOrEmployer = $sibling->schoolOrEmployer;
//                $sib->classOrSalary = $sibling->classOrSalary;
//                $sib->others = $sibling->others;
//                $sib->year = date('Y');
//                $sib->applicationId = $request->applicationId;
//                $sib->status = 0;
//                $sib->save();
//            }
        }

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $uploadedFile) {
                $filename = $uploadedFile->store('uploads');
                // echo $filename;
                $file = new File();
                $file->applicationId = $request->applicationId;
                $file->path = $filename;
                $file->status = 0;
                $file->year = date('Y');
                $file->save();
            }
        }
        return response(['status' => 'success'], 200);
    }
}
