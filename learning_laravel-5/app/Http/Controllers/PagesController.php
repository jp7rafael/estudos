<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public function about()
  {
    $first = 'Rafael';
    $last = 'Luiz';
    $names = [
      'My',
      'Rafael',
      'Luiz',
      'Testa'
    ];

    return view('pages.about', compact('first', 'last', 'names'));
  }

  public function contact()
  {
    $alert = false;
    return view('pages.contact', compact('alert'));
  }
}
