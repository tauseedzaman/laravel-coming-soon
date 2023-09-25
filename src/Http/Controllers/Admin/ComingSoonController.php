<?php

namespace tauseedzaman\ComingSoon\Http\Controllers\Admin;


use tauseedzaman\ComingSoonHttp\Controllers\Controller;
use tauseedzaman\ComingSoon\Models\ComingSoon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ComingSoonController extends Controller
{
    public function index()
    {
        return view("comingsoon::coming_soon_admin.index", [
            'items' => ComingSoon::latest()->get()
        ]);
    }

    public function create()
    {
        return view("comingsoon::coming_soon_admin.create");
    }

    public function store(Request $request)
    {
        $domain = parse_url(config('app.url'), PHP_URL_HOST);

        $request->validate([
            'title' => 'required|unique:coming_soons,title',
            'url' => [
                'required',
                'url',
                function ($attribute, $value, $fail) use ($domain) {
                    if (strpos($value, $domain) === false) {
                        $fail('The ' . $attribute . ' must contain the domain ' . $domain . '.');
                    }
                },
            ],
            'launch_time' => [
                'required',
                function ($attribute, $value, $fail) {
                    $datetime = Carbon::parse($value);
                    if ($datetime->isPast()) {
                        $fail('The ' . $attribute . ' must be a future date and time.');
                    }
                },
            ],
            'descritions' => 'required',
        ]);

        ComingSoon::create([
            'page_url' => $request->url,
            'title' => $request->title,
            'description' => $request->descritions,
            'launch_time' => $request->launch_time,
        ]);
        return redirect()->route("coming_soon_admin.index")->with("success", "Item Created Successfully.");
    }

    public function edit($id)
    {
        $item = ComingSoon::findOrFail($id);
        return view("comingsoon::coming_soon_admin.edit", compact("item"));
    }

    public function update(Request $request, $id)
    {
        // Get the record to update
        $comingSoon = ComingSoon::findOrFail($id);

        // Get the domain from the app configuration
        $baseUrl = config('app.url');
        $parsedUrl = parse_url($baseUrl);
        $domain = isset($parsedUrl['host']) ? $parsedUrl['host'] : '';

        $request->validate([
            'title' => 'required|unique:coming_soons,title,' . $comingSoon->id,
            'url' => [
                'required',
                'url',
                function ($attribute, $value, $fail) use ($domain) {
                    if (strpos($value, $domain) === false) {
                        $fail('The ' . $attribute . ' must contain the domain ' . $domain . '.');
                    }
                },
            ],
            'launch_time' => [
                'required',
                function ($attribute, $value, $fail) {
                    $datetime = Carbon::parse($value);
                    if ($datetime->isPast()) {
                        $fail('The ' . $attribute . ' must be a future date and time.');
                    }
                },
            ],
            'descritions' => 'required',
        ]);

        // Update the record with the new values
        $comingSoon->update([
            'page_url' => $request->url,
            'title' => $request->title,
            'description' => $request->descritions,
            'launch_time' => $request->launch_time,
        ]);

        return redirect()->route("coming_soon_admin.index")->with("success", "Item Updated Successfully.");
    }


    public function destroy($id)
    {
        $item = ComingSoon::findOrFail($id);
        $item->delete();
        return redirect()->route("coming_soon_admin.index")->with("success", "Item Deleted Successfully.");
    }
}
