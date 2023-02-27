@extends('layouts..user.master')
@push('css')
    <style>
        .features-item h4 {
            margin-top: -30px !important;
        }
    </style>
@endpush
@section('content')
    <div id="features" class="features section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center">
                        <div class="alert alert-success">
                            <h4>Thank you for completing the task😻</h4>
                            <button type="button" onclick="showUrlForm()" class="btn btn-info mt-5 mb-5">GET YOUR AWARD
                                NOW!</button>
                            <div id="form-div">
                                <form action="{{ $form_route }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3"></div>
                                    <label for="">{{$task_title}}</label>
                                    <input type="text" name="profile" required class="form-control">
                                    <div class="form-group mt-3">
                                        <button type="submit" class="btn btn-success">COMPLETE</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="contact" class="contact-us section">
        <div class="container">
        </div>
    </div>
@endsection
@push('js')
    <script>
        $('#form-div').hide();

        function showUrlForm() {
            $('#form-div').show();
        }
    </script>
@endpush
