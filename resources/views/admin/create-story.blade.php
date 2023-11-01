@php
    if(!empty(old())){
        $title = old('title');
        $slug = old('slug');
        $excerpt = old('excerpt');
        $tags = old('tags');
        $content = old('text');
        $coverImage = old('image1');
        $metaTitle = old('metaTitle');
        $metaDesc = old('metaDesc');
        $metaTag = old('metaTag');
        $schema = old('schema');
        $status = old('status');
        $setting = old('homesetting');
        $classification[] = (!empty(old('classification'))) ? old('classification') : array() ;
        $contributor[] = (!empty(old('contributor'))) ? old('contributor') : array() ;
        $author = old('author');
        $update_date = old('update_date');
    }
    elseif (!empty($story)){
        $title = $story->title;
        $slug = $story->slug;
        $excerpt = $story->excerpt;
        $tags = $story->tags;
        $coverImage = $story->coverImage;
        $content = $story->content;
        $coverImage = $story->coverImage;
        $metaTitle = $story->metaTitle;
        $metaDesc = $story->metaDesc;
        $metaTag = $story->metaTag;
        $schema = $story->schema;
        $status = $story->status;
        $setting = $story->setting;
        $classification = (!empty($story->classification)) ? explode(",",$story->classification) : array();
        $contributor = (!empty($story->contributors)) ? explode(",",$story->contributors) : array();
        $author = $story->author;
        $update_date = $story->update_date;
    }
    else{
        $title = '';
        $slug = '';
        $excerpt = '';
        $tags = '';
        $content = '';
        $coverImage = "";
        $metaTitle = '';
        $metaDesc = '';
        $metaTag = '';
        $schema = '';
        $status = '';
        $setting = '';
        $classification = '';
        $contributor = '';
        $author = '';
        $update_date = '';
    }
@endphp
@extends('admin.layouts.main')
@section('content')
    <div class="body-content">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                @if(request()->has('edit'))
                                    <h6 class="fs-17 font-weight-600 mb-0">Edit Story</h6>
                                @else
                                    <h6 class="fs-17 font-weight-600 mb-0">Create Story</h6>
                                @endif

                            </div>
                        </div>
                    </div>
                    @if (Session::has('msg'))
                        <div class="container mt-2 mb-2">
                            <div class="alert alert-{{session("type")}} alert-dismissible fade show" style="width: 60%;" role="alert">
                                <strong>{!! Session('msg') !!}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        </div>
                    @endif

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                        <div class="container mt-2 mb-2">
                            <div class="alert alert-danger alert-dismissible fade show" style="width: 60%;" role="alert">
                                <strong>{{ $error }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        </div>
                        @endforeach
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('create-story') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <input type="text" name="storyId" value="{{ (!empty($story->id)) ? $story->id : '' }}" hidden="">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label class="req">Title</label>
                                        <input type="text" name="title" placeholder="Story Title here..." class="form-control cslug" value="{{ $title }}" data-link="slug" required >
                                    </div>
                                    <div class="form-group">
                                        <label class="req">Slug</label>
                                        <input type="text" name="slug" value="{{ $slug }}" class="form-control" required >
                                    </div>
                                    <div class="form-group col-md-12 p-0">
                                        <label class="font-weight-600 req">Excerpt:</label>
                                        <div class="input-group">
                                            <textarea class="form-control tcount" placeholder="Excerpt here..." id="exampleFormControlTextarea1" rows="3" name="excerpt" data-count="text" required >{{ $excerpt }}</textarea>
                                            <div class="input-group-append">
                                                <span class="input-group-text count countShow">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 p-0">
                                        <label class="font-weight-600 req">Story Tags</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control tcount" data-role="tagsinput" placeholder="Tag1,Tag2,Tag3" data-count="tags" data-role="tagsinput" name="tags" value="{{ $tags }}">
                                        </div>
                                    </div>
                                    {{--<div class="form-group col-lg-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header card bg-secondary text-white">
                                                <b class="req"> Tags </b>
                                            </div>
                                            <div class="card-body">
                                                <div class="skin-line">
                                                    <select name="classification[]" multiple="multiple" onchange="console.log($(this).children(':selected').length)" class="search_test">
                                                        @foreach($tagss as $ttt)
                                                            <option value="{{ $ttt->id }}">{{ $ttt->tag  }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>--}}
                                    <div class="form-group">
                                        <label class="font-weight-600 req d-block">Content:</label>
                                        <script src="{{ asset('assets/tinymce/tinymce.min.js') }}"></script>
                                        <script>
                                        function _full_Ed() {
                                            tinymce.init({
                                                setup: /*function(editor) {
                                                        editor.on("init", function() {
                                                            editor.shortcuts.remove('ctrl+s');
                                                        });
                                                    }*/ function(ed) {
                                                    ed.on("load keyup", function(){
                                                        $('#lp-message').html(tinymce.activeEditor.getContent());
                                                    });
                                                },
                                                mode: "specific_textareas",
                                                editor_selector: "oneditor",
                                                valid_children : '-p[img],+div[img],span[img]',
                                                autosave_interval: "5s",
                                                plugins: [
                                                    "advlist autolink link image lists charmap preview hr anchor pagebreak spellchecker",
                                                    "searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking",
                                                    "table contextmenu directionality emoticons template paste textcolor image code", "autosave" ,"fullscreen"
                                                ],
                                                rel_list: [{
                                                    title: 'None',
                                                    value: ''
                                                },
                                                    {
                                                        title: 'No Referrer',
                                                        value: 'noreferrer'
                                                    },
                                                    {
                                                        title: 'No Opener',
                                                        value: 'noopener'
                                                    },
                                                    {
                                                        title: 'No Follow',
                                                        value: 'nofollow'
                                                    }
                                                ],
                                                target_list: [{
                                                    title: 'None',
                                                    value: ''
                                                },
                                                    {
                                                        title: 'Same Window',
                                                        value: '_self'
                                                    },
                                                    {
                                                        title: 'New Window',
                                                        value: '_blank'
                                                    },
                                                    {
                                                        title: 'Parent frame',
                                                        value: '_parent'
                                                    }
                                                ],
                                                style_formats: [
                                                    {
                                                        title: 'Custom Bullet',
                                                        selector: 'li',
                                                        classes: 'cum_list',
                                                        styles:{
                                                            "list-style-image" : "https://svgsilh.com/svg/304167.svg"
                                                        }
                                                    }
                                                ],
                                                style_formats_merger :true,
                                                toolbar: "insertfile undo redo | restoredraft | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview media | forecolor backcolor emoticons | removeformat | blockquote ",
                                                theme_advanced_path: false,
                                                paste_as_text: false,
                                                extended_valid_elements: 'script[src|async|defer|type|charset]',
                                                relative_urls: false,
                                                remove_script_host: false,
                                                theme_advanced_resizing: true,
                                                forced_root_block : 'p',
                                                force_p_newlines : true,
                                                style_formats: [{
                                                    title: 'Bold text',
                                                    inline: 'b'
                                                },
                                                    {
                                                        title: 'Header 1',
                                                        block: 'h1'
                                                    },
                                                    {
                                                        title: 'Header 2',
                                                        block: 'h2'
                                                    },
                                                    {
                                                        title: 'Header 3',
                                                        block: 'h3'
                                                    },
                                                    {
                                                        title: 'Header 4',
                                                        block: 'h4'
                                                    },
                                                    {
                                                        title: 'Header 5',
                                                        block: 'h5'
                                                    },
                                                    {
                                                        title: 'Header 6',
                                                        block: 'h6'
                                                    },
                                                ]
                                            });
                                        }
                                        _full_Ed();
                                    </script>
                                        <a class="insert-media btn btn-danger btn-sm" data-type="image"
                                           data-for="editor" data-return="#oneditor" data-link="image">Add
                                            Image</a>
                                        <div>
                                                    <textarea class="form-control oneditor" rows="30" name="text"
                                                              id="oneditor">{{ $content }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-6">
                                            <div class="card">
                                                <div class="card-header card bg-secondary text-white">
                                                    <b class="req"> Classification </b>
                                                </div>
                                                <div class="card-body">
                                                    <div class="skin-line">
                                                        <select name="classification[]" multiple="multiple" onchange="console.log($(this).children(':selected').length)" class="search_test">
                                                            @foreach($cats as $cat)
                                                                <option value="{{ $cat->id }}" {{ (!empty($classification) and in_array($cat->id,$classification)) ? 'selected'  : ''  }}>{{ (!empty($cat->parent)) ? '━━ ' : '' }}{{ $cat->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 ">
                                            <div class="card">
                                                <div class="card-header card bg-secondary text-white">
                                                    <b class="req"> Author </b>
                                                </div>
                                                <div class="card-body">
                                                    <div class="skin-line">
                                                        <select name="author" class="form-control" >
                                                            <option value="">Please Select Author</option>
                                                            @foreach($aa as $a)
                                                                <option value="{{ $a->id }}" {{ ($author == $a->id) ? 'selected' : '' }}>{{ $a->dname }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-6 ">
                                            <div class="card">
                                                <div class="card-header card bg-secondary text-white">
                                                    <b class="req"> Home-Page Settings </b>
                                                </div>
                                                <div class="card-body">
                                                    <div class="skin-line">
                                                        <select name="homesetting" class="form-control">
                                                            <option value="">Select Home Settings</option>
                                                            @foreach($home as $h)
                                                                <option value="{{ $h }}" {{ $h == $setting ? 'selected' : ''  }} @php
                                                                if (!empty(\App\Models\story::where("setting","LIKE","$h")->first("setting"))){
                                                                    @endphp
                                                                style="background-color: darkred;color:whitesmoke;"
                                                                    @php
                                                                }
                                                                @endphp>{{ $h }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 ">
                                            <div class="card">
                                                <div class="card-header card bg-secondary text-white">
                                                    <b class="req"> Schedule Post </b>
                                                </div>
                                                <div class="card-body">
                                                    <div class="skin-line">
                                                        <div class="input-group date" id="id_0">
                                                            <input type="text" value="{{ $update_date }}"
                                                                   name="update_date" class="form-control"
                                                                   placeholder="{{ (!empty($update_date))? $update_date : "MM/DD/YYYY hh:mm:ss" }}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-6 ">
                                            <div class="card">
                                                <div class="card-header card bg-secondary text-white">
                                                    <b class="req"> Contributors </b>
                                                </div>
                                                <div class="card-body">
                                                    <div class="skin-line">
                                                        @php
                                                            if (!empty($contributor)){
                                                                $cc = count($contributor);
                                                                $e = 0;
                                                                }
                                                            else{
                                                                $cc = 0;
                                                                $e= 0;
                                                            }
                                                        @endphp
                                                        <select name="contributor[]" multiple="multiple" onchange="console.log($(this).children(':selected').length)" class="search_test">
                                                            @foreach($con as $h)
                                                                <option value="{{ $h->id }}" {{ (!empty($contributor) and in_array($h->id,$contributor)) ? 'selected'  : ''  }}>
                                                                    @php
                                                                        $c = json_decode($h->contributor);
                                                                        echo $c->dname;
                                                                    @endphp
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 ">
                                            <div class="card">
                                                <div class="card-header card bg-secondary text-white">
                                                    <b class="req"> Status </b>
                                                </div>
                                                <div class="card-body">
                                                    <div class="skin-line">
                                                        <select name="status" class="form-control" >
                                                            <option value="">Please Select Status</option>
                                                            <option value="1" {{ ($status == 1) ? 'selected' : 'selected' }}>Active</option>
                                                            <option value="0" {{ ($status == 0) ? 'selected' : '' }}>Draft</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="card">
                                            <div class="card-header card bg-secondary text-white">
                                                <b class="req"> Cover Image [ Exact Size <small> 600 x 300</small>  ] </b>
                                            </div>
                                            <div class="card-body gallery">
                                                <div class="form-group">
                                                    @php
                                                        $coverImage = json_decode($coverImage);
                                                        $total = 0;
                                                        if(is_array($coverImage)){
                                                            $total = count($coverImage);
                                                            $o = 1;
                                                        }
                                                    @endphp
                                                    <input type="hidden" name="total_images" value="{{ $total }}">
                                                    @for($i = 0; $i < $total; $i++)
                                                        <div class="uc-image col-lg-3 col-md-4 col-sm-6">
                                                            <span class="close-image-x">x</span>
                                                            <input type="hidden" name="image{{ $o }}" value="{{ (!empty($coverImage)) ? $coverImage[$i] : '' }}">
                                                            <div id="m-image{{ $o }}" class="image_display">
                                                                <img src="{!! (!empty($coverImage[$i])) ? $coverImage[$i] : '' !!}">
                                                            </div>
                                                            <div style="margin-top:10px;">
                                                                <a type="file"
                                                                   class="insert-media btn btn-info btn-sm"
                                                                   data-type="image" data-for="display"
                                                                   data-return="#m-image{{ $o }}" data-link="image{{ $o }}">Add
                                                                    Image/Url</a>
                                                            </div>
                                                        </div>
                                                        @php
                                                            $o++;
                                                        @endphp
                                                    @endfor
                                                    @if(!is_array($coverImage))
                                                        <div class="uc-image col-lg-3 col-md-4 col-sm-6">
                                                            <span class="close-image-x">x</span>
                                                            <input type="hidden" name="image1" id="imgss" value="{{ (!empty(old('image1'))) ? old('image1') : $coverImage }}">
                                                            <div id="m-image1" class="image_display">
                                                                <img id="imgs" src="{{ (!empty(old('image1'))) ? old('image1') : $coverImage }}">
                                                            </div>
                                                            <div style="margin-top:10px;">
                                                                <a type="file"
                                                                   class="insert-media btn btn-info btn-sm"
                                                                   data-type="image" data-for="display"
                                                                   data-return="#m-image1" data-link="image1">Add
                                                                    Image/Url</a>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="ext-image"></div>
                                                    <div class="add-more-images2"><a href="#" class="btn btn-info float-right">Add More</a> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 p-0">
                                        <label class="font-weight-600">Meta Title</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control tcount" placeholder="Meta Title here..." name="metaTitle" value="{{ $metaTitle }}" data-count="text">
                                            <div class="input-group-append">
                                                <span class="input-group-text count countShow">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 p-0">
                                        <label class="font-weight-600">Meta Description</label>
                                        <div class="input-group">
                                            <textarea class="form-control tcount" id="exampleFormControlTextarea1" placeholder="Meta Description here..." rows="3" name="metaDesc" data-count="text">{{ $metaDesc }}</textarea>
                                            <div class="input-group-append">
                                                <span class="input-group-text count countShow">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 p-0">
                                        <label class="font-weight-600">Meta Keywords</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control tcount" placeholder="Meta Keywords here..." name="metaTag" value="{{ $metaTag }}" data-count="text">
                                            <div class="input-group-append">
                                                <span class="input-group-text count countShow">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 p-0">
                                        <div class="card">
                                            <div class="card-header card bg-secondary text-white">
                                                <b> Schema </b>
                                            </div>
                                            <div class="card-body">
                                                <div class="schema">
                                                    <div class="schema-rows">
                                                        <div class="new-schema border row p-2">
                                                            <span class="clear-data2">x</span>
                                                            <div class="col-lg-12">
                                                                <div class="flex-center"><b><span class="no">1 &nbsp; - &nbsp; </span></b> <span class="schma_type"> </span> <input type="text" name="type[]" placeholder="schema name here" value="">  </div> <br>
                                                                <div class="form-row">
                                                                    <div class="form-group col-lg-12">
                                                                        <textarea rows="6" name="schema" class="form-control" placeholder="Schema here...">{{ $schema }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 p-0">
                                        <div class="d-flex justify-content-end">
                                            @if(request()->has('edit'))
                                                <button type="submit" name="submit" value="publish" class="btn btn-info">Update </button>
                                            @else
                                                <button type="submit" name="submit" value="publish" class="btn btn-info">Publish </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card" style="width: -webkit-fill-available; position: fixed;">
                    <div class="p-5" id="lp-message" style="height: 105vh;overflow-y: scroll;">
                    </div>
                    <script async src="www.instagram.com/embed.js"></script>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </div>
        </div>
    </div>
@endsection
