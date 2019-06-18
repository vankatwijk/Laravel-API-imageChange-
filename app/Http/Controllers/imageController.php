<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;

class imageController extends Controller
{


  private function basicChange($image){

    $image = Image::make($image)->fit(300);
    return $image;
  }

  private function addWaterMark($image){

    $image = Image::make($image)->insert('watermark.png')->fit(600);
    return $image;
  }
  private function addText($image){

    $image = Image::make($image)->text('This is a example ', 120, 100, function($font) {
          $font->size(28);
          $font->color('#e1e1e1');
          $font->align('center');
          $font->valign('bottom');
          $font->angle(90);
      });
    return $image;
  }

  private function pixelate($image){

    $image = Image::make($image)->pixelate(12);
    return $image;
  }


  public function changeImage(Request $request){
    $data = request()->validate([
            'image' => ['required', 'image'],
        ]);

    $image = $request->file('image');
    $imageName = time().$image->getClientOriginalName();
    $image = $this->basicChange($image);
    $image = $this->pixelate($image);
    $image = $this->addWaterMark($image);
    $image = $this->addText($image);


    $image = Image::make($image)->save(public_path('img/' . $imageName));

    //dd(request()->all());
    return view('change',[
        'image' => $imageName,
    ]);
  }

  public function changeImageBase64(Request $request){
    $data = request()->validate([
            'image' => ['required', 'image'],
        ]);

    $image = $request->file('image');
    $image = $this->basicChange($image);
    $image = $this->pixelate($image);
    $image = $this->addWaterMark($image);
    $image = $this->addText($image);

    //dd(request()->all());
    //return (string) Image::make($image)->encode('data-url');
    $baseImage = (string) Image::make($image)->encode('data-url');
    return view('changeBase64',[
        'image' => $baseImage,
    ]);
  }
}
