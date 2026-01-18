@extends('layouts.app')

@section('content')
  <h1 class="text-xl font-semibold tracking-tight">
    Editing {{ $data->name }} Goal
  </h1>
  <hr class="m-4 rounded dark:text-gray-800">

  <form method="POST" action="{{ route('goals.update', ['goal' => $data->id]) }}">
    @csrf
    @method('PUT')
    <div class="space-y-12">
      <div class="border-b border-white/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="col-span-full">
            <label for="name" class="block text-sm/6 font-medium text-white">Title</label>
            <div class="mt-2">
              <input id="name" value="{{ $data->name }}" type="text" name="name" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
            </div>
          </div>

          <div class="col-span-3">
            <label for="goal" class="block text-sm/6 font-medium text-white">Goal</label>
            <div class="mt-2">
              <input id="goal" value="{{ $data->goal }}" type="number" name="goal" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
            </div>
          </div>

          <div class="col-span-3">
            <label for="starting_goal" class="block text-sm/6 font-medium text-white">Starting Goal</label>
            <div class="mt-2">
              <input id="starting_goal" value="{{ $data->starting_goal }}" type="number" min="0" name="starting_goal" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button type="submit" class="rounded-md bg-lime-800 px-3 cursor-pointer py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Update</button>
    </div>

  </form>
@endsection
