@php
    $edit = !is_null($dataTypeContent->getKey());
    $add  = is_null($dataTypeContent->getKey());
@endphp

@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
@stop

@section('page_title', __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form role="form"
                            class="form-edit-add"
                            action="{{ $edit ? route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) : route('voyager.'.$dataType->slug.'.store') }}"
                            method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        @if($edit)
                            {{ method_field("PUT") }}
                        @endif

                        <!-- CSRF TOKEN -->
                        {{ csrf_field() }}

                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @php
                                $dataTypeRows = $dataType->{($edit ? 'editRows' : 'addRows' )};
                                
                            @endphp

                            @foreach($dataTypeRows as $row)
                                <!-- GET THE DISPLAY OPTIONS -->
                                @php
                                    $display_options = $row->details->display ?? NULL;
                                    if ($dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')}) {
                                        $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')};
                                    }
                                @endphp
                            @endforeach

                            <section id="category">
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select  class="form-control select2" name="category_id" category required>
                                    </select>
                                </div>
                            </section>

                            <section id="subject">
                                <div class="form-group">
                                    <label for="subject">Subject</label>
                                    <select  class="form-control select2" name="subject_id" subjects required>
                                    </select>
                                </div>
                            </section>

                            <section id="school">
                                <div class="form-group">
                                    <label for="school">School</label>
                                    <select  class="form-control select2" name="school_id" schools>
                                    </select>
                                </div>
                            </section>

                            <section id="year">
                                <div class="form-group">
                                    <label for="year">Year</label>
                                    <input type="text" class="form-control" id="year" name="year"
                                        placeholder="1996" value="{{ $edit ? $dataTypeContent->year :  old('year') }}" required>
                                </div>
                            </section>

                            <div class="form-group">
                                <label for="body">Question</label>
                                <textarea id="editor" name="question_name"  placeholder="What the question??" rows="9" class="form-control richTextBox" required>{!! $edit ? $dataTypeContent->question_name :  old('question_name') !!}
                                </textarea>      
                            </div>

                            <div class="form-group">
                                <label for="image">Question Image</label>
                                <input type="file" id="image" name="question_image" class="form-control-file" accept=".jpg,.png,.gif" @if($edit) value="{{ $dataTypeContent->image }}"@endif/>
                            </div>
                              
                            <section id="new_option">
                                <div class="form-group">
                                  Options 
                                </div>
                      
                                <div option-list>
                                  
                                </div>
                                <div>
                                  <button type="button" class="btn btn-light" new-option>+ Add New</button>
                                </div>
                            </section>

                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            @section('submit-buttons')
                                <button type="submit" class="btn btn-primary save" id="submit_btn" disabled>{{ __('voyager::generic.save') }}</button>
                            @stop
                            @yield('submit-buttons')
                        </div>
                    </form>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>
                    <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                            enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                        <input name="image" id="upload_file" type="file"
                                 onchange="$('#my_form').submit();this.value='';">
                        <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                        {{ csrf_field() }}
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
@stop

@section('javascript')
<script>
    var additionalConfig = {
            min_height: 100,
        }

    $.extend(additionalConfig, {!! json_encode($options->tinymceOptions ?? '{}') !!})

    tinymce.init(window.voyagerTinyMCE.getConfig(additionalConfig));

</script>
   <script>
       var edit = '{{ $edit  }}';
       var selected_category = parseInt("{{ $dataTypeContent->category_id }}");
       var selected_subject = parseInt("{{ $dataTypeContent->subject_id }}");
       var selected_school = parseInt("{{ $dataTypeContent->school_id }}");

            // Categories
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                url: "{{ route('category.index') }}",
                method: "get",
                success: function(data){
                    $.each(data, function( index, value ) {
                        (value.id === selected_category) ? selected = "selected" : selected = "";
                        
                        $('[category]').append(`<option value="${value.id}" ${selected}>${value.name}</option>`)
                        })
                }
            });

            // Subjects
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                url: "{{ route('subjects.index') }}",
                method: "get",
                success: function(data){
                        $.each(data, function( index, value ) {
                            (value.id === selected_subject) ? selected = "selected" : selected = "";
                            $('[subjects]').append(`<option value="${value.id}" ${selected}>${value.name}</option>`)
                        })
                }
            });

            // hide and show school based on category
            $( "[category]" ).change(function () {
                var selected_val = $("[category] option:selected").text();
                if(selected_val == "School") {
                    count = 0;
                    $("#school").show();
                    checkboxCounter();

                    // Get list or schools
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    })
                    $.ajax({
                        url: "{{ route('schools.index') }}",
                        method: "get",
                        success: function(data){
                                $.each(data, function( index, value ) {
                                    (value.id === selected_school) ? selected = "selected" : selected = "";
                                    $('[schools]').append(`<option value="${value.id}" ${selected}>${value.name}</option>`)
                                })
                        }
                    });
                }else {
                    $("#school").hide();
                    count = 0;
                    checkboxCounter();
                }
            }).change();

            $("[new-option]").click(function() {
                count = count + 1;
                $('[option-list]').append(`
                <div id="option_${count}" class="ola mt-5">
                    <div class="form-group">
                    <label for="option_name">Option </label>
                    <input type="text" name="option_name[]" id="option_name${count}"
                            class="form-control option_name richTextBox" placeholder="Option ${count}">
                    </div>
                    <div class="form-group">
                        <input type="radio" name="option_answer" class="form-check-input" id="option_answer${count}" value="${count - 1}">
                        <label class="form-check-label" for="option_answer${count}">Correct Answer</label>
                    </div>
                    <div class="form-group">
                    <label for="option_image">Option Image</label>
                    <input type="file" name="option_image[]" id="option_image${count}"
                            class="form-control-file option_image">
                    </div>
                    <button type="submit" id="submit" class="btn btn-danger mb-5" onclick="removeLine(option_${count})">Delete</button>
                </div>
            `)
            checkboxCounter();
            });

            function removeLine(elemId) { 
                $(elemId).remove();
                count = count - 1;
                checkboxCounter();
            }

            function checkboxCounter()
            {
                if(count == 0){
                    $("#submit_btn").prop('disabled', true);
                }else {
                    $("#submit_btn").prop('disabled', false);
                }
            }

        function optionsList(){
            var url = '{{ route("questionOptions", ":id") }}';
            var question_id = '{{ $dataTypeContent->id  }}';
            url = url.replace(':id', question_id);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }	
                });
                $.ajax({
                    url: url,
                    method: "GET",
                    success: function (data) {
                        var data_count = data.length;
                        count = data_count;
                        checkboxCounter();

                        // $('[new-line]').hide();

                        $.each(data, function(i, value) {
                            (value.answer === "Yes") ? selected = "checked" : selected = "";
                            $('[option-list]').append(`
                            <div id="product_${value.id}" class="ola mt-5">
                                <div class="form-group">
                                <label for="option_name">Option </label>

                                <input type="hidden" name="option_id[]" id="option_id${value.id}" class="form-control option_id" value="${value.id}">

                                <input type="text" name="option_name[]" id="option_name${value.id}"
                                        class="form-control option_name" placeholder="Option " value="${value.name}">
                                </div>
                                <div class="form-group">
                                    <input type="radio" name="option_answer" class="form-check-input" id="option_answer${value.id}" value="${i}" ${selected}>
                                    <label class="form-check-label" for="option_answer${value.id}">Correct Answer</label>
                                </div>
                                <div class="form-group">
                                    <label for="option_image">Option Image</label>
                                    <input type="file" name="option_image[]" id="option_image${value.id}"
                                    class="form-control-file option_image">
                                </div>
                                <button type="submit" id="submit" class="btn btn-danger mb-5" onclick="removeAvailableLine(product_${value.id}, ${value.id}, ${question_id})">Delete</button>
                            </div>`)
                            });
                    },
                    error: function(err) {
                        console.log(err);
                    }
                })
        }
        
        if(edit){
            
            optionsList();

            function removeAvailableLine(domOptionId, optionId, questionId)
            {
                removeLine(domOptionId);
                var option_url = '{{ route("QuestionDeleteOption", ["question_id"=> ":question_id", "option_id"=> ":option_id"] ) }}';
                option_url = option_url.replace(':question_id', questionId);
                option_url = option_url.replace(':option_id', optionId);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }	
                    });
                    $.ajax({
                        url: option_url,
                        method: "DELETE",
                        success: function (data) {
                            console.log(data);
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    })
            }

        }
   </script>
@stop
