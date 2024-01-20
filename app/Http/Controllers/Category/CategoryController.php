<?php
namespace App\Http\Controllers\Category;
use App\Contracts\Auth\AuthContract;
use App\Contracts\Category\CategoryContracts;
use App\Contracts\Clinic\ClinicContract;
use App\Contracts\Doctor\DoctorContract;
use App\Contracts\Patient\PatientContract;
use App\Http\Controllers\BaseController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CategoryController extends BaseController
{
    private $AuthContract;
    private $ClinicContract;
    private $DoctorContract;
    private $PatientContract;
    private $CategoryContract;
    public function __construct(AuthContract $AuthContract, ClinicContract $ClinicContract, DoctorContract $DoctorContract,  PatientContract $PatientContract, CategoryContracts $CategoryContract)
    {
        $this->AuthContract = $AuthContract;
        $this->ClinicContract = $ClinicContract;
        $this->DoctorContract = $DoctorContract;
        $this->PatientContract = $PatientContract;
        $this->CategoryContract = $CategoryContract;
    }
    public function index()
    {
        $this->setPageTitle('Specialist');
        $fetchCategoryList = $this->CategoryContract->getAll();
        return view('admin.category.index', compact('fetchCategoryList'));
    }
    public function add(Request $request)
    {
        $this->setPageTitle('Add Specialist');
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
            ]);
            DB::beginTransaction();
            try {
                if ($request->uuid) {
                    $insertArry = $request->except(['_token', '_method']);
                    $isUpdateCreated = $this->CategoryContract->updateCategory($insertArry);
                    // dd($isUpdateCreated);
                    if ($isUpdateCreated) {
                        DB::commit();
                        return $this->responseRedirect('admin.category.list', 'Category Update Successfully', 'success', false);
                    }
                } else {
                    $insertArry = $request->except(['_token', '_method', 'id']);
                    $isCategoryCreated = $this->CategoryContract->createCategory($insertArry);
                    if ($isCategoryCreated) {
                        DB::commit();
                        return $this->responseRedirect('admin.category.list', 'Category Created Successfully', 'success', false);
                    }
                }
            } catch (\Exception $e) {
                DB::rollBack();
                logger($e->getMessage() . '--' . $e->getFile() . '--' . $e->getLine());
                return $this->responseRedirectBack('Something went wrong', 'error', true);
            }
        }
        return view('admin.category.add-edit');
    }
    public function edit($uuid)
    {
        $this->setPageTitle('Edit Category');
        $data = $this->CategoryContract->findZoneById($uuid);
        return view('admin.category.add-edit', compact('data'));
    }
}
