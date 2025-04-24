<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class VideosController extends Controller
{
    public function index()
    {
        $videos = Video::where('user_id', Auth::id())->paginate(10);

        /** @var view-string $view */
        $view = 'videos.index';

        return view($view, compact('videos'));
    }

    public function create()
    {
        /** @var view-string $view */
        $view = 'videos.create';

        return view($view);
    }

    public function show(Video $video)
    {
        $this->authorize('view', $video);

        /** @var view-string $view */
        $view = 'videos.show';

        return view($view, compact('video'));
    }

    public function edit(Video $video)
    {
        $this->authorize('update', $video);

        /** @var view-string $view */
        $view = 'videos.edit';

        return view($view, compact('video'));
    }
    public function update(Request $request, Video $video)
    {
        $this->authorize('update', $video);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'required|url',
        ]);

        $video->update($validated);

        return redirect()->route('videos.index')->with('success', 'Video updated successfully.');
    }

    public function destroy(Video $video)
    {
        $this->authorize('delete', $video);
        $video->delete();

        return redirect()->route('videos.index')->with('success', 'Video deleted successfully.');
    }

    private function authorize(string $ability, $model = null): void
    {
        if (!Gate::allows($ability, $model)) {
            abort(403);
        }
    }

}
