@extends('layouts.master')

@section('content')


    <div class="panel-body">

        <form id="reset-form" class="form-visitors" role="form" method="POST" action="{{ URL::asset('/password/email') }}">

            <header>

                <h4>Reset form</h4>

                @include('errors.errors')

                {{--@if ( session('status') )--}}
                    {{--<div class="alert alert-success">--}}
                        {{--{{ session('status') }}--}}
                    {{--</div>--}}

                {{--@endif--}}

            </header>

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <fieldset>

                <section>

                    <div class="row">

                        <label class="label col col-4">E-mail:</label>

                        <div class="col col-8">

                            <label class="input">

                                <i class="icon icon-user"></i>

                                <input type="email" name="email" value="{{ old('email') }}">

                            </label>

                        </div>

                    </div>

                </section>

            </fieldset>

            <footer>

                <button type="submit" class="button">
                    Send
                </button>

            </footer>

        </form>

    </div>

@endsection
