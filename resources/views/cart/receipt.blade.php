@extends('layouts.dashbord')

@section('content')
    <section class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="receipt">
                    <header class="receipt__header">
                        <p class="receipt__title text-primary">
                            Codepen Sweet Shop
                        </p>
                        <p class="receipt__date">13 December 2020</p>
                    </header>
                    <dl class="receipt__list">
                        <div class="receipt__list-row">
                            <dt class="receipt__item">CSS Candies</dt>
                            <dd class="receipt__cost">£9.99</dd>
                        </div>
                        <div class="receipt__list-row">
                            <dt class="receipt__item">HoTML Chocolate</dt>
                            <dd class="receipt__cost">£4.19</dd>
                        </div>
                        <div class="receipt__list-row">
                            <dt class="receipt__item">Jelly Scripts</dt>
                            <dd class="receipt__cost">£3.99</dd>
                        </div>
                        <div class="receipt__list-row">
                            <dt class="receipt__item">JamStack Crisps</dt>
                            <dd class="receipt__cost">£5.99</dd>
                        </div>
                        <div class="receipt__list-row">
                            <dt class="receipt__item">Sherbet Nodes</dt>
                            <dd class="receipt__cost">£2.59</dd>
                        </div>
                        <div class="receipt__list-row receipt__list-row--total">
                            <dt class="receipt__item">Total</dt>
                            <dd class="receipt__cost">£26.75</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>

    </section>

@endsection
