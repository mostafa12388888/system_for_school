<?php

namespace App\Http\Livewire;

use App\Models\My_parnt;
use App\Models\National;
use App\Models\parent_attchment;
use App\Models\Religion;
use App\Models\Type_Blood;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

use function Pest\Laravel\delete;

class AddParents extends Component
{
    use WithFileUploads;
    public $successMessage = '';
    public $currentStep = 1, $photos, $show_parants = true, $updateMode = false,
        // Father_INPUTS
        $Email, $Password, $Parent_id,
        $Name_Father, $Name_Father_en,
        $National_ID_Father, $Passport_ID_Father,
        $Phone_Father, $Job_Father, $Job_Father_en,
        $Nationality_Father_id, $Blood_Type_Father_id,
        $Address_Father, $Religion_Father_id,

        // Mother_INPUTS
        $Name_Mother, $Name_Mother_en,
        $National_ID_Mother, $Passport_ID_Mother,
        $Phone_Mother, $Job_Mother, $Job_Mother_en,
        $Nationality_Mother_id, $Blood_Type_Mother_id,
        $Address_Mother, $Religion_Mother_id;
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'Email' => 'required|email',
            'National_ID_Father' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'Passport_ID_Father' => 'min:10|max:10',
            'Phone_Father' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'National_ID_Mother' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'Passport_ID_Mother' => 'min:10|max:10',
            'Phone_Mother' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);
    }

    public function render()
    {
        return view(
            'livewire.add-parents',
            ['my_parents' => My_parnt::all(), 'Nationalities' => National::all(), 'Type_Bloods' => Type_Blood::all(), 'Religions' => Religion::all()]
        );
    }
    public function firstStepSubmit()
    {
        $this->validate([
            'Email' => 'required|unique:my_parnts,Email,' . $this->id,
            'Password' => 'required',
            'Name_Father' => 'required',
            'Name_Father_en' => 'required',
            'Job_Father' => 'required',
            'Job_Father_en' => 'required',
            'National_ID_Father' => 'required|unique:my_parnts,Nationan_id_father,' . $this->id,
            'Passport_ID_Father' => 'required|unique:my_parnts,passpord_id_father,' . $this->id,
            'Phone_Father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'Nationality_Father_id' => 'required',
            'Blood_Type_Father_id' => 'required',
            'Religion_Father_id' => 'required',
            'Address_Father' => 'required',
        ]);
        $this->currentStep = 2;
    }
    public function secondStepSubmit()
    {
        $this->validate([
            'Name_Mother' => 'required',
            'Name_Mother_en' => 'required',
            'National_ID_Mother' => 'required|unique:my_parnts,Nationan_id_mather,' . $this->id,
            'Passport_ID_Mother' => 'required|unique:my_parnts,passpord_id_mather,' . $this->id,
            'Phone_Mother' => 'required',
            'Job_Mother' => 'required',
            'Job_Mother_en' => 'required',
            'Nationality_Mother_id' => 'required',
            'Blood_Type_Mother_id' => 'required',
            'Religion_Mother_id' => 'required',
            'Address_Mother' => 'required',
        ]);

        $this->currentStep = 3;
    }

    function back($c)
    {
        $this->currentStep = $c;
    }
    public function submitForm()
    {
        $pr = new My_parnt();
        $pr->Email = $this->Email;
        $pr->password = Hash::make($this->Password);
        $pr->Name_father = ['ar' => $this->Name_Father, 'en' => $this->Name_Father_en];
        $pr->job_father = ['ar' => $this->Job_Father, 'en' => $this->Job_Father_en];
        $pr->Nationan_id_father = $this->National_ID_Father;
        $pr->passpord_id_father = $this->Passport_ID_Father;
        $pr->phone_father = $this->Phone_Father;
        $pr->National_id_father = $this->Nationality_Father_id;
        $pr->Blood_id_father = $this->Blood_Type_Father_id;
        $pr->Religion_father_id = $this->Religion_Father_id;
        $pr->addres_father = $this->Address_Father;


        //data for mather
// dd( $this->Religion_Mother_id);
        $pr->Name_mather = ['ar' => $this->Name_Mother, 'en' => $this->Name_Mother_en];
        $pr->job_mather = ['ar' => $this->Job_Mother, 'en' => $this->Job_Mother_en];
        $pr->Nationan_id_mather = $this->National_ID_Mother;
        $pr->passpord_id_mather = $this->Passport_ID_Mother;
        $pr->phone_mather = $this->Phone_Mother;
        $pr->National_id_mather = $this->Nationality_Mother_id;
        $pr->Blood_id_mather = $this->Blood_Type_Mother_id;
        $pr->Religion_mather_id  = $this->Religion_Mother_id;
        $pr->addres_mather = $this->Address_Mother;
        $pr->save();
        if (!empty($this->photos)) {
            foreach ($this->photos as $photo) {
                $photo->storeAs($this->National_ID_Father, $photo->getClientOriginalName(), $disk = "parent_Attchment");
                parent_attchment::create([
                    'file_name' => $photo->getClientOriginalName(),
                    'parent_id' => My_parnt::latest()->first()->id,
                ]);
            }
        } 
        $this->successMessage = trans('messages.success');
        $this->clear();
        $x=storage::files('livewire-tmp');
        foreach($x as $value){
            Storage::delete($value);
        }
       return redirect()->to('/add_parent');
    }
    // return()->to this step will move follw clear function
    public function clear()
    {
        $this->Email = '';
        $this->Password = '';
        $this->Name_Father = '';
        $this->Name_Father_en = '';
        $this->Job_Father = '';
        $this->Job_Father_en = '';
        $this->National_ID_Father = '';

        $this->Blood_Type_Father_id = '';
        $this->Religion_Father_id = '';
        $this->Address_Father = '';
        $this->Passport_ID_Father = '';
        $this->Phone_Father = '';
        //clear data with mather
        $this->Name_Mother = '';
        $this->Name_Mother_en = '';
        $this->Job_Mother = '';
        $this->Job_Mother_en = '';
        $this->National_ID_Mother = '';

        $this->Blood_Type_Mother_id = '';
        $this->Religion_Mother_id = '';
        $this->Address_Mother = '';
        $this->Passport_ID_Mother = '';
        $this->Phone_Mother = '';
    }
    // change between table and insert
    public function showformadd()
    {
        $this->show_parants = false;
    }
    public function edit($id)
    {

        $data = My_parnt::where('id', $id)->first();
        $this->Email = $data->Email;
        $this->Password = $data->password;
        $this->Name_Father = $data->getTranslation('Name_father', 'ar');
        $this->Parent_id = $id;
        $this->Name_Father_en = $data->getTranslation('Name_father', 'en');
        $this->Job_Father = $data->getTranslation('job_father', 'ar');
        $this->Job_Father_en = $data->getTranslation('job_father', 'en');
        $this->Nationality_Father_id = $data->National_id_father;
$this->National_ID_Father=$data->Nationan_id_father;
        $this->Blood_Type_Father_id = $data->Blood_id_father;
        $this->Religion_Father_id = $data->Religion_father_id;
        $this->Address_Father = $data->addres_father;
        $this->Passport_ID_Father = $data->passpord_id_father;
        $this->Phone_Father = $data->phone_father;

        $this->Name_Mother = $data->getTranslation('Name_mather', 'ar');

        $this->Name_Mother_en = $data->getTranslation('Name_mather', 'en');
        $this->Job_Mother = $data->getTranslation('job_mather', 'ar');
        $this->Job_Mother_en = $data->getTranslation('job_mather', 'en');
        $this->National_ID_Mother = $data->Nationan_id_mather;
        $this->Nationality_Mother_id = $data->National_id_mather;

        $this->Blood_Type_Mother_id = $data->Blood_id_mather;
        $this->Religion_Mother_id = $data->Religion_mather_id ;
        $this->Address_Mother = $data->addres_mather;
        $this->Passport_ID_Mother = $data->passpord_id_mather;
        $this->Phone_Mother = $data->phone_mather;
        $this->show_parants = false;
        $this->currentStep = 1;
        $this->updateMode = true;
    }
    public function firstStepupdate()
    {
        $this->currentStep = 2;
        $this->updateMode = true;
    }
    public function secondStepUpdate()
    {
        $this->currentStep = 3;
        $this->updateMode = true;
    }
    public function submitupdateForm()
    {
        
        if ($this->Parent_id) {
            
            $My_Parent = My_parnt::findOrFail($this->Parent_id);
$oldName_of_folder=$My_Parent->Nationan_id_father;
            // rename ( ,'44' ,$disk = "" ) ;
           
         
               
                $My_Parent->Email = $this->Email;
                $My_Parent->Password = Hash::make($this->Password);
                $My_Parent->Name_father = ['en' => $this->Name_Father_en, 'ar' => $this->Name_Father];
                $My_Parent->Nationan_id_father = $this->National_ID_Father;
                $My_Parent->passpord_id_father = $this->Passport_ID_Father;
                $My_Parent->phone_father = $this->Phone_Father;
                $My_Parent->job_father = ['en' => $this->Job_Father_en, 'ar' => $this->Job_Father];
               
                $My_Parent->National_id_father = $this->Nationality_Father_id;
                $My_Parent->Blood_id_father = $this->Blood_Type_Father_id;
                $My_Parent->Religion_father_id = $this->Religion_Father_id;
                $My_Parent->addres_father = $this->Address_Father;

                $My_Parent->Name_mather = ['en' => $this->Name_Mother_en, 'ar' => $this->Name_Mother];
                $My_Parent->Nationan_id_mather = $this->National_ID_Mother;
                $My_Parent->passpord_id_mather = $this->Passport_ID_Mother;
                $My_Parent->phone_mather = $this->Phone_Mother;
                $My_Parent->job_mather = ['en' => $this->Job_Mother_en, 'ar' => $this->Job_Mother];
               
                $My_Parent->National_id_mather = $this->Nationality_Mother_id;
                $My_Parent->Blood_id_mather = $this->Blood_Type_Mother_id;
                $My_Parent->Religion_mather_id = $this->Religion_Mother_id;
                $My_Parent->addres_mather = $this->Address_Mother;
                $My_Parent->update();
             
                if (!empty($this->photos)) {
                    $paraen_attchment2= parent_attchment::where('parent_id',$this->Parent_id);
                    if(empty($paraen_attchment2)){
                        foreach ($this->photos as $photo) {
                            $photo->storeAs($this->National_ID_Father, $photo->getClientOriginalName(), $disk = "parent_Attchment");
                            parent_attchment::create([
                                'file_name' => $photo->getClientOriginalName(),
                                'parent_id' => My_parnt::latest()->first()->id,
                            ]);
                        }
                    }else{
                    $x=storage::disk('parent_Attchment')->files($oldName_of_folder);
                    foreach($x as $value){
                        Storage::delete($value);
                    }
                   $paraen_attchment2->delete();
                    foreach ($this->photos as $photo) {
                        $photo->storeAs($oldName_of_folder, $photo->getClientOriginalName(), $disk = "parent_Attchment");
                       
                        parent_attchment::create([
                            'file_name' => $photo->getClientOriginalName(),
                            'parent_id' =>$this->Parent_id,
                        ]);
                    }
                    if($oldName_of_folder!=$this->National_ID_Father){
                        Storage::disk('parent_Attchment')->move($oldName_of_folder, $this->National_ID_Father);
                    }}}else if($oldName_of_folder!=$this->National_ID_Father){
                        Storage::disk('parent_Attchment')->move($oldName_of_folder, $this->National_ID_Father);
                                }
                
                            
                
                
              
               


            $this->show_parants = true;
             $this->updateMode = false;
            
            $this->successMessage = trans('messages.Update');
        }
     
    }
    public function delete($id){
$x=My_parnt::findOrfail($id);

        $attchmentFile=parent_attchment::where('parent_id',$id)->delete();
if(!empty($attchmentFile)){
    storage::disk('parent_Attchment')->deleteDirectory('/'.$x->Nationan_id_father);  
   
}
My_parnt::destroy($id);
    return redirect()->back();

}
}
