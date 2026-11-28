<?php

namespace App\Http\Controllers\Api\V1\MasterData;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreCountryRequest;
use App\Http\Requests\Api\UpdateCountryRequest;
use App\Http\Services\CountryService;
use App\JsonApi\JsonApi;
use App\JsonApi\Serializers\CountrySerializer;
use App\Models\Country\Country;
use Illuminate\Http\Request;

/** Master geografi (00PRD/features/01-master-organization.md). Tanpa delete, hanya activate/deactivate. */
class CountryController extends Controller
{
    public function index(Request $request, CountryService $service)
    {
        $size = min($request->integer('page.size', 15), 100);
        $page = max($request->integer('page.number', 1), 1);

        $paginator = $service->list([
            'is_active' => $request->has('filter.is_active') ? $request->boolean('filter.is_active') : null,
        ], $size, $page);

        return JsonApi::response(JsonApi::document(
            CountrySerializer::collection($paginator->getCollection()),
            ['meta' => ['total' => $paginator->total()]],
        ));
    }

    public function show(Country $country, CountryService $service)
    {
        return JsonApi::response(JsonApi::document(
            CountrySerializer::resource($service->show($country)),
        ));
    }

    public function store(StoreCountryRequest $request, CountryService $service)
    {
        $country = $service->create($request->validated('data.attributes'));

        return JsonApi::response(
            JsonApi::document(CountrySerializer::resource($country)),
            201,
            ['Location' => url("/api/v1/countries/{$country->id}")],
        );
    }

    public function update(UpdateCountryRequest $request, Country $country, CountryService $service)
    {
        $country = $service->update($country, $request->validated('data.attributes', []));

        return JsonApi::response(JsonApi::document(
            CountrySerializer::resource($country),
        ));
    }

    public function activate(Country $country, CountryService $service)
    {
        return JsonApi::response(JsonApi::document(
            CountrySerializer::resource($service->activate($country)),
        ));
    }

    public function deactivate(Country $country, CountryService $service)
    {
        return JsonApi::response(JsonApi::document(
            CountrySerializer::resource($service->deactivate($country)),
        ));
    }
}
