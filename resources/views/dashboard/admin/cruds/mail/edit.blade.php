@extends('dashboard.partials.layout')

@section('title' , $title??"Dashboard")


@section('content')

    <div id="app">


        <div class="container">
            <form
                    novalidate="novalidate">
                @method('PATCH')

                @include('dashboard.admin.cruds.mail.form')

            </form>
        </div>


        <div class="container">
            <form method="POST" role="form" id="components_contents_form"
                  novalidate="novalidate">
                {{--action="{{route('mails.update.components' ,[$mail->id])}}"--}}


                @csrf
                <input type="hidden" value="{{$mail->id}}" name="mail_id">
                <hr>

                <h2>Components Content</h2>

                <div class="row">
                    @isset($mail->components)
                        @foreach($mail->components as $component)


                            <div class="col-12">
                                <div class="form-group">

                                    @php
                                        //->types->type . $component->id
                                            $input ='input_'. $component->id;


                                            $type = $component->input_type->type;
                                    @endphp
                                    <label for="{{$input}}">{{$type}}</label>
                                    @if($type ==='texts')
                                        <textarea id="{{$input}}"
                                                  class="form-control @error($input) is-invalid @enderror"
                                                  name="components[{{$component->id}}]"
                                                  rows="3"
                                                  placeholder="Enter value">{{ $component->content }}</textarea>
                                    @endif


                                    @if($type ==='images')
                                        <input id="{{$input}}" class="form-control @error($input) is-invalid @enderror"
                                               name="components[{{$component->id}}]"

                                               placeholder="Enter value" value="{{   $component->content }}">
                                    @endif

                                    @if($type ==='buttons')
                                        <input id="{{$input}}" class="form-control @error($input) is-invalid @enderror"
                                               name="components[{{$component->id}}]"

                                               placeholder="Enter value" value="{{  $component->content }}">
                                    @endif


                                    @error($input)
                                    <p class="invalid-feedback">{{$message}}</p>
                                    @enderror

                                </div>
                            </div>

                        @endforeach
                    @endisset


                    //append the rest of types inputs
                </div>

                <div class="form-group">
                    <input type="submit" value="Submit" class="btn btn-primary" v-on:click="store_mail_components">
                </div>
            </form>
        </div>


    </div>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            const app = new Vue({
                el: '#app',
                data: {
                    newsletter: {},
                    components: {},
                    component: {},
                }, methods: {
                    store_mail_components: function (event) {
                        event.preventDefault();


                        var form = document.querySelector('#components_contents_form');
                        var data = new FormData(form);

                        //        action="
                        @isset($mail->id)
                        axios.post('{{route('mails.update.components' ,[$mail->id])}}', data)

                            .then(function (response) {
                                toastr["info"]("success");

                            })

                            .catch(function (error) {

                                currentObj.output = error;

                            });


                        @endisset

                    },
                    store_mail: function (event) {
                        event.preventDefault();

                        let formdata = {
                            title: $('#title').val(),
                            content_types: $('#content_types').val(),
                            newsletter_id: $('#newsletter_id').val(),
                            _token: '{{csrf_token()}}'

                        }
                        @php
                            if(isset($mail->id)){

                            $action= route('mails.update' , ['mail'=>$mail]);
                            $method='put';
                            }
                            else{
                            $action= route('mails.store');
                               $method='post';
                            }

                        @endphp

                        axios.{{$method}}('{{$action}}', formdata)

                            .then(function (response) {
                                toastr["info"]("success");

                                console.log(response.data)

                                location.href = response.data;


                            })

                            .catch(function (error) {

                                currentObj.output = error;

                            });

                    }


                }
            });
        })


    </script>








@endsection

