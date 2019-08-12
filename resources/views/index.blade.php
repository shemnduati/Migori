@extends('layouts.app')

@section('content')
  
@endsection

<!-- if ($request->passport && $request->fatherId && $request->motherId && $request->guardianId) {
            $ext = explode('/', explode(':', substr($request->passport, 0, strpos($request->passport, ';')))[1])[1];
            $ext1 = explode('/', explode(':', substr($request->fatherId, 0, strpos($request->fatherId, ';')))[1])[1];
            $ext2 = explode('/', explode(':', substr($request->motherId, 0, strpos($request->motherId, ';')))[1])[1];
            $ext3 = explode('/', explode(':', substr($request->guardianId, 0, strpos($request->guardianId, ';')))[1])[1];


            if ($ext == 'pdf' && $ext1 == 'pdf' ) {   
            }elseif ($ext == 'png' && $ext1 == 'png') {
              $passport_name = time().'.' . $ext;
              \Image::make($request->passport)->save(public_path('uploads/').$passport_name);

              $fatherId_name = 'try'.'.' . $ext1;
              \Image::make($request->fatherId)->save(public_path('uploads/').$fatherId_name); 

            }elseif ($ext1 == 'png') {
              $fatherId_name = time().'.' . explode('/', explode(':', substr($request->fatherId, 0, strpos($request->fatherId, ';')))[1])[1];
              \Image::make($request->fatherId)->save(public_path('uploads/').$fatherId_name);   
            }elseif ($ext2 == 'png') {
              $motherId_name = time().'.' . explode('/', explode(':', substr($request->motherId, 0, strpos($request->motherId, ';')))[1])[1];
              \Image::make($request->motherId)->save(public_path('uploads/').$motherId_name);   
            }elseif ($ext3 == 'png') {
              $guardianId_name = time().'.' . explode('/', explode(':', substr($request->guardianId, 0, strpos($request->guardianId, ';')))[1])[1];
              \Image::make($request->guardianId)->save(public_path('uploads/').$guardianId_name);   
            }
        } -->