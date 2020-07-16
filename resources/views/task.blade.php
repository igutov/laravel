@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Записи') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('task.store') }}">
                        @csrf

                        <div class="input-group mb-3">
                            <input type="text" name="task" value="" class="form-control" aria-label="Default">
                            <div class="input-group-prepend">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Записать') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('task.index') }}">
                        @csrf
                        <ul>
                            @forelse ($list as $task)
                            <li>
                                <input class="form-check-input" type="checkbox" name="one_task" value="{{ $task->id }}">{{ $task->task }}
                            </li>
                            @empty
                            <li>
                                Записей нет
                            </li>
                            @endforelse
                        </ul>

                        <div class="">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Удалить отмеченные записи') }}
                            </button>
                            <!-- <input type="submit" class="btn btn-primary" name="destroy" value="{{ __('Удалить отмеченные записи') }}"> -->
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
