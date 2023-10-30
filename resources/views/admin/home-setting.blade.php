@extends('admin.layouts.main')
@section('content')
    @php
        $menu_o = json_decode($menu_o->value,true);
    @endphp
    <div class="body-content">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <b>Category</b>
                        @if (Session::has('msg'))
                            <div class="container mt-3 mb-3">
                                <div class="alert alert-{{session("type")}} alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{!! Session('msg') !!}</strong>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <ul class="menu-cat todo-list m-t ui-sortable" style="margin-top:0px;">
                            @foreach($categorys as $cat)
                            <li style="cursor:pointer;" data-id="{{ $cat->id }}" data-title="{{ $cat->name }}" data-type="category" data-link="{{ route('HomeUrl').'/'.$cat->slug.'-1'.$cat->id }}" class="menu-added">{{ $cat->name }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-header">
                        <b>Custom Links</b>
                    </div>
                    <div class="card-body">
                        <label>URL</label>
                        <input type="text" name="url" placeholder="http://" class="form-control"> <br>
                        <label>Link Text</label>
                        <input type="text" name="text" class="form-control">
                        <div class="text-right">
                            <br>
                            <button name="add" class="btn btn-info menu-added" data-type="link">Add to Menu</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <form method="post" action="">
                        @csrf
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0">Arrange Category order</h6>
                                </div>
                                <div class="text-right">
                                    <div class="actions">
                                        <div class="actions">
                                            <a href="{{ route('homepage') }}" class="btn btn-info pull-right">Meta Settings</a>
                                            <a href="{{ route('h_slider') }}" class="btn btn-info pull-right">Slider Content</a>
                                            <a href="{{ route('h_meta') }}" class="btn btn-inverse pull-right">Home Page Settings</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="dd" id="nestable">
                                <ol class="dd-list main-dd-list">
    @foreach($menu_o as $menu)
    <li class= 'dd-item'
                data-type = "{{ $menu['type'] }}"
                data-title = "{{ $menu['title'] }}"
                data-link = "{{ $menu['link'] }}"
        >
        <div class='dd-handle'> {{ $menu['title'] }}
            <span class='menu-del pull-right' data-id='x'>x</span>
            <span class='type pull-right'>{{ $menu['type'] }}</span>
        </div>
        @if(!empty($menu['children']))
            @php
                $childs = $menu['children'];
            @endphp

        <ol class='dd-list'>
            @foreach($childs as $child)
            <li class= 'dd-item'
                data-type = "{{ $child['type'] }}"
                data-title = "{{ $child['title'] }}"
                data-link = "{{ $child['link'] }}"
                >
                <div class='dd-handle'> {{ $child['title'] }}
                    <span class='menu-del pull-right' data-id='x'>x</span>
                    <span class='type pull-right'>{{ $child['type'] }}</span>
                </div>
                 @if(!empty($child['children']))
                    @php
                        $childss = $child['children'];
                    @endphp
                <ol class='dd-list'>
                    @foreach($childss as $cv)
                    <li class= 'dd-item'
                        data-type = "{{ $cv['type'] }}"
                data-title = "{{ $cv['title'] }}"
                data-link = "{{ $cv['link'] }}"
                        >
                        <div class='dd-handle'> {{ $cv['title'] }}
                            <span class='menu-del pull-right' data-id='x'>x</span>
                            <span class='type pull-right'>{{ $cv['type'] }}</span>
                        </div>
                    </li>
                    @endforeach
                </ol>
                @endif
            </li>
            @endforeach
        </ol>

        @endif
    </li>
    @endforeach
</ol>
                            </div>
                            <div class="text-right" style="margin-top:25px;">
                                <textarea id="nestable-output" name="data" style="display:none;"></textarea>
                                <button class="btn btn-info save-menu" type="submit" name="save">Save Menu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
