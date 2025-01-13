<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\language;
use App\Http\Requests\StorelanguageRequest;
use App\Http\Requests\UpdatelanguageRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\languageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class LanguageController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(StorelanguageRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('flag')) {
            $file = $request->file('flag');
            $filename = time() . '_' . $file->getClientOriginalName();
            $directory = 'img/flags/';
            $path = $directory.$filename;
            Storage::disk('public')->putFileAs($directory, $file, $filename);
            $validatedData['flag'] = $path;
        }

        Language::create($validatedData);
        return redirect()->route('admin.languages')->with('success', 'Done');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorelanguageRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(language $language)
    {
        $languages = language::all();
        return view('admin.languages.lang', compact('languages'));
    }
    public function active(language $language)
    {
        $languages = language::all()->where('active',1);
        return view('admin.languages.lang', compact('languages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(language $language)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorelanguageRequest $request, $id )
    {

        $language = Language::findOrFail($id);

        if ($request->hasFile('flag')) {
            $file = $request->file('flag');
            $filename = time() . '_' . $file->getClientOriginalName();
            $directory = 'img/flags/';
            $path = $directory.$filename;
            $path = $request->file('flag')->store( $directory, 'public');

        }else {
            $path = $language->flag;
        }

        /*$language->update([
            'name' => $request->name,
            'abbr' => $request->abbr,
            'native' => $request->native,
            'local' => $request->local,
            'direction' => $request->direction,
            'active' => $request->active,
            'flag' => $path,
            ]
        );*/
        $data = $request->except('_token');
        $data['flag'] = $path;
        $language->update($data);
        return redirect()->route('admin.languages')->with('success', 'Done');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(language $language , $id)
    {
        $language = Language::findOrFail($id);
        $language->delete();

        return redirect()->route('admin.languages')->with('success', 'Language deleted successfully!');
    }
}
