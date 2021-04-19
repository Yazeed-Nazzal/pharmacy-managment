@extends('layouts.dashbord')

@section('content')
    <section class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="receipt">
                    <header class="receipt__header">
                        <p class="receipt__title text-primary">
                            Pharmacy
                        </p>
                        <p class="receipt__date">{{now()}}</p>
                    </header>
                    <dl class="receipt__list">
                        @php
                            $total = 0
                        @endphp
                        @foreach($records as $record)
                            @php($total += $record->drug->price * $record->count)
                        <div class="receipt__list-row receipt__list-row--total">
                            <dt class="receipt__item">{{$record->drug->name}}</dt>
                            <dd class="receipt__cost">{{$record->drug->price * $record->count }}$</dd>
                        </div>
                        @endforeach
                        <div class="receipt__list-row receipt__list-row--total">
                            <dt class="receipt__item">Total</dt>
                            <dd class="receipt__cost">{{$total}}$</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>

    </section>

@endsection
