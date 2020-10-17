<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DriveController extends Controller
{
  protected $project;

  public function __construct(Project $project)
  {
    $this->project = $project;
  }

  public function index(Request $request)
  {
    if ($request->google_drive_folder_id) {
      return collect(Storage::cloud()->listContents($request->google_drive_folder_id, false));
    }
  }

  public function createSubFolder(Request $request)
  {
    if (!$request->basename) {
      $project = $this->project->find($request->projectId);
      if (!$project->google_drive_folder_id) {
        if (Storage::cloud()->makeDirectory($project->name)) {
          $contents = collect(Storage::cloud()->listContents('/', false));
          $dir = $contents->where('type', '=', 'dir')
            ->where('filename', '=', $project->name)
            ->first(); // There could be duplicate directory names!

          $project->update(['google_drive_folder_id' => $dir['basename']]);

          $result = Storage::cloud()->makeDirectory($dir['path'] . '/' . $request->name);

          $contents = collect(Storage::cloud()->listContents('/' . $dir['basename'], false));
          $dir = $contents->where('type', '=', 'dir')
            ->where('name', '=', $request->name)
            ->first();
        }
      }
    } else {
      $result = Storage::cloud()->makeDirectory($request->basename . '/' . $request->name);

      $contents = collect(Storage::cloud()->listContents('/' . $request->basename, false));
      $dir = $contents->where('type', '=', 'dir')
        ->where('name', '=', $request->name)
        ->first();
    }

    if ($result) {
      return response()->json([
        'data' => $dir,
        'message' => 'New folder was created in Google Drive'
      ]);
    }
  }

  public function upload(Request $request)
  {
    $filename = $request->file('file')->getClientOriginalName();
    $result = Storage::cloud()->put($request->basename . '/' . $filename, fopen($request->file('file'), 'r+'));
    if ($result) {
      return response()->json([
        'message' => 'File uploaded successfully!'
      ]);
    }
  }

  public function delete($basename)
  {
    $result = Storage::cloud()->delete($basename);
    if ($result) {
      return response()->json([
        'message' => 'Directory/File was deleted from Google Drive!'
      ]);
    }
  }
}
