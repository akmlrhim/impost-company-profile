<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ServiceController extends Controller
{
    use HandlesUploads;

    public function index(Request $request): Response
    {
        return Inertia::render('Admin/Services/Index', [
            'services' => Service::query()
                ->orderBy('sort')
                ->paginate(10)
                ->withQueryString(),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Services/Create');
    }

    public function store(ServiceRequest $request)
    {
        $validated = $request->validated();
        $data = $this->stripUploadKeys($validated, 'cover_file');
        $data['cover_path'] = $this->resolveImagePath($validated, 'cover_file', 'cover_path', null);

        Service::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Service created.');
    }

    public function edit(Service $service): Response
    {
        return Inertia::render('Admin/Services/Edit', [
            'service' => $service,
        ]);
    }

    public function update(ServiceRequest $request, Service $service)
    {
        $validated = $request->validated();
        $data = $this->stripUploadKeys($validated, 'cover_file');
        $data['cover_path'] = $this->resolveImagePath($validated, 'cover_file', 'cover_path', $service->cover_path);

        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Service updated.');
    }

    public function destroy(Service $service)
    {
        $this->deleteImage($service->cover_path);

        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted.');
    }
}
