@extends('layouts.app')

@section('content')
  <h1 class="text-xl font-semibold tracking-tight">
    Dashboard
  </h1>

  <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
    Here you can track your savings goals.
  </p>

  <div class="mt-6 grid gap-4 sm:grid-cols-2">
    <div class="rounded-xl border border-gray-200 p-4 dark:border-gray-800">
      <div class="text-sm font-medium">Total Saved</div>
      <div class="mt-2 text-2xl font-semibold">{{ $total }} AED</div>
    </div>

    <div class="rounded-xl border border-gray-200 p-4 dark:border-gray-800">
      <div class="text-sm font-medium">Active Goals</div>
      <div class="mt-2 text-2xl font-semibold">{{ $count }}</div>
    </div>
  </div>
  <hr class="m-4 rounded dark:text-gray-800">
  <div class="overflow-x-auto rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-800 dark:bg-gray-900">
    <table class="w-full text-center text-sm">
      <thead class="bg-gray-50 text-xs font-semibold uppercase tracking-wide text-gray-600 dark:bg-gray-900 dark:text-gray-300">
        <tr>
          <th class="px-4 py-3">Title</th>
          <th class="px-4 py-3">Goal</th>
          <th class="px-4 py-3">Remaining</th>
          <th class="px-4 py-3">Starting Goal</th>
          <th class="px-4 py-3">Progress</th>
          <th class="px-4 py-3">Started At</th>
          <th class="px-4 py-3">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
        @foreach ($data as $v)
          @php
            $earned = $v->savings_sum_amount + $v->starting_goal;
            if ($earned != 0) {
                $pct = floor(($earned / $v->goal) * 100);
            } else {
                $pct = 0;
            }
          @endphp
          <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/60 cursor-pointer" onclick="window.location='{{ route('savings.list', ['goal' => $v->id]) }}'">
            <td class="px-4 py-3">{{ $v->name }}</td>
            <td class="px-4 py-3">{{ $earned }} / {{ $v->goal }} AED </td>
            <td class="px-4 py-3">{{ $v->goal - $earned }} AED</td>
            <td class="px-4 py-3">{{ $v->starting_goal }} AED</td>
            <td class="px-4 py-3">
              <div class="relative h-4 w-full rounded-full bg-gray-200 dark:bg-gray-800 overflow-hidden">
                <div class="h-full rounded-full bg-lime-800" style="width: {{ $pct }}%"></div>
                <span class="absolute inset-0 flex items-center justify-center text-[10px] font-semibold text-white" style="text-shadow: 0 0 4px rgba(0,0,0,.8)">
                  {{ $pct }}%
                </span>
              </div>
            </td>
            <td class="px-4 py-3 text-gray-600 dark:text-gray-300">{{ $v->created_at->format('Y-m-d') }}</td>
            <td class="px-4 py-3">
              <a href="{{ route('savings.create', ['goal' => $v->id]) }}" class="inline-flex items-center gap-2 whitespace-nowrap rounded-lg px-3 py-1.5 text-xs font-semibold cursor-pointer text-gray-700 dark:bg-lime-800 hover:bg-lime-600 dark:text-gray-200 dark:hover:bg-lime-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Add Saving
              </a>
              <a href="{{ route('goals.edit', ['goal' => $v->id]) }}" class="inline-flex items-center gap-2 whitespace-nowrap rounded-lg px-3 py-1.5 text-xs font-semibold cursor-pointer text-gray-700 dark:bg-teal-800 hover:bg-teal-600 dark:text-gray-200 dark:hover:bg-teal-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>
                Edit
              </a>
              <form method="POST" action="{{ route('goals.destroy', ['goal' => $v->id]) }}" onsubmit="return confirm('Are you sure you want to delete this goal?')" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center gap-2 whitespace-nowrap rounded-lg px-3 py-1.5 text-xs font-semibold
                 cursor-pointer text-gray-700 dark:bg-red-800 hover:bg-red-600
                 dark:text-gray-200 dark:hover:bg-red-600">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.108 0 0 0-7.5 0" />
                  </svg>
                  Delete
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
