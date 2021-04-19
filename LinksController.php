<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\URLs;

class LinksController extends Controller
{
    public function index()
    {
        $links = URLs::latest()->get();
        return view('links.index', ['link' =>$links]); //render list of links
    }

    public function create()
    {
        return view('links.create'); //provides view to create new link 
    }

    public function store()
    {
        request()->validate({
            'link_title' => 'required',
            'url'=> 'required',
            'publication_date'=> 'required',
            'date_last_accessed'=> 'required',
            'category'=> 'required',
        });

        $url = new URL();
        $url->link_title = request('link_title');
        $url->url = request('url');
        $url->publication_date = request('publication_date');
        $url->date_last_accessed = request('date_last_accessed');
        $url->category = request('category');
        $url->save();

        return redirect('/urls');
        //implement the input created link
    }

    public function show(URLs $url)
    {
        return view('links.show', ['link' =>$id]); //show specific URL by unique id number
    }

    public function edit(URLs $url)
    {
        return view('links.edit', compact('link')); //edit existing link
    }

    public function update(URLs $url)
    {
        request()->validate({
            'link_title' => 'required',
            'url'=> 'required',
            'publication_date'=> 'required',
            'date_last_accessed'=> 'required',
            'category'=> 'required',
        });

        $url->link_title = request('link_title');
        $url->url = request('url');
        $url->publication_date = request('publication_date');
        $url->date_last_accessed = request('date_last_accessed');
        $url->category = request('category');
        $url->save();

        return redirect('/urls/' . $url->id);
        //implement the edited existing link
    }

    public function destroy(URLs $url)
    {
        // delete the curated link object
    }
}
