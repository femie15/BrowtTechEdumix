<?php

namespace App\Components\Users;

use Bastinald\Ux\Traits\WithModel;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class Saveparent extends Component
{
    use WithFileUploads;
    use WithModel;

    public $user;
    public $house, $image,$imager;

    protected $listeners = ['fileUpload' => 'handleFileUpload'];

    public function handleFileUpload($getImage){
        $this->image = $getImage;
    }

    public function storeImage($imgId='')
    {
        if(!$this->image){
             return null;
            }
                // encode png image as jpg
        $jpg = Image::make($this->image)->encode('jpg');

        // resize the image to a width of 200 and constrain aspect ratio (auto height)
        $jpg->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();    
            $constraint->upsize();
        });

        $jpg->save('assets/images/users/'.$imgId.'.jpg');

    }

    public function mount(User $user = null)
    {
        $this->user = $user;
        $this->setModel($user->toArray());
        if(file_exists('assets/images/users/'.$this->getModel('id').'.jpg')){
             $this->imager='../assets/images/users/'.$this->getModel('id').'.jpg';
             $this->image='assets/images/users/'.$this->getModel('id').'.jpg';
        }else{
            $this->imager='../assets/images/users/user.jpg';
            $this->image='assets/images/users/user.jpg';
        }
    }

    public function render()
    {
        return view('users.Saveparent');
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user->id)],
            'password' => [!$this->user->exists ? 'required' : 'nullable', 'confirmed'],
        ];
    }

    public function save()
    {
        $this->validateModel();

        if (!empty($this->house)) {
            $this->house->store('public/assets/images/users');
        }
        $this->setModel('school_id',Auth::user()->school_id);
        $this->setModel('role','parent');

        $this->user->fill($this->getModelExcept('password_confirmation'))->save();

        $image = $this->storeImage($this->user->fill($this->getModelExcept('password_confirmation'))->id);

        $this->emit('hideModal');
        $this->emit('$refresh');
    }
}
