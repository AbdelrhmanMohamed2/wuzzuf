<?php

namespace App\Http\Controllers\Frontend\Company;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\profile\UpdateProfileRequest;
use App\Traits\UploadFile;

class CompanyProfileController extends Controller
{
    use UploadFile;
    public function update(UpdateProfileRequest $request)
    {
        $validated_data = $request->validated();
        if (is_null($validated_data['password'])) {
            unset($validated_data['password']);
        }

        // dd($validated_data);
        $image_name = $request->has('image') ? $this->uploadFile(User::UPLOADED_IMAGE, $request->image, auth()->user()->image) : auth()->user()->image;
        auth()->user()->update([
            'image' => $image_name,
        ] + $validated_data);

        auth()->user()->company()->update([
            'name' => $request->name,
            'website' => $request->website,
            'description' => $request->description,
            'company_size_id' => $request->company_size_id,
            'area_id' => $request->area_id,
        ]);

        toast('Your Profile has been updated successfully', 'success');
        return redirect()->back();
    }
}
