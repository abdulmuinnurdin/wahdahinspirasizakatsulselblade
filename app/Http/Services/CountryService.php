<?php

namespace App\Http\Services;

use App\Models\Country\Country;
use App\Support\TraceId;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

class CountryService
{
    /**
     * @var string
     */
    protected $headerLog = '[CountryService] => ';

    /**
     * @var string
     */
    protected $channelLog = 'frontend';

    /** @param array{is_active?: bool|null} $filters */
    public function list(array $filters, int $size, int $page): LengthAwarePaginator
    {
        $query = Country::query();

        if (array_key_exists('is_active', $filters) && $filters['is_active'] !== null) {
            $query->where('is_active', $filters['is_active']);
        }

        return $query->orderBy('name')->paginate($size, ['*'], 'page', $page);
    }

    public function show(Country $country): Country
    {
        return $country;
    }

    public function create(array $attributes): Country
    {
        $traceId = TraceId::current();

        $country = Country::query()->create($attributes);

        Log::channel($this->channelLog)->info(
            $this->headerLog.'CREATE => '.$traceId.' => create : SUCCESS',
            ['trace_id' => $traceId, 'country_id' => $country->id]
        );

        return $country;
    }

    public function update(Country $country, array $attributes): Country
    {
        $traceId = TraceId::current();

        $country->update($attributes);

        Log::channel($this->channelLog)->info(
            $this->headerLog.'UPDATE => '.$traceId.' => update : SUCCESS',
            ['trace_id' => $traceId, 'country_id' => $country->id]
        );

        return $country;
    }

    public function activate(Country $country): Country
    {
        return $this->setActive($country, true);
    }

    public function deactivate(Country $country): Country
    {
        return $this->setActive($country, false);
    }

    private function setActive(Country $country, bool $isActive): Country
    {
        $traceId = TraceId::current();

        $country->update(['is_active' => $isActive]);

        Log::channel($this->channelLog)->info(
            $this->headerLog.($isActive ? 'ACTIVATE' : 'DEACTIVATE').' => '.$traceId.' => setActive : SUCCESS',
            ['trace_id' => $traceId, 'country_id' => $country->id, 'is_active' => $isActive]
        );

        return $country;
    }
}
