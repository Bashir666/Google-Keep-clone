@foreach ($notes as $note)
    <div class="col-xxl-3 col-md-6 col-xl-4">
        <div class="single_note"
            @if ($note->appearance_type == 'color')
            style="background:{{$note->color_name }}"
            @else
             style="background-image:url('{{ asset($note->image_path)}}')"
            @endif
            >

            <a class="single_note_check" href="#"><i class="far fa-check"></i></a>
            <div class="single_note_content" data-modal="modal_{{ $note->id }}">
                <h2>{{ $note->title }}</h2>
                <p>{{ Str::limit($note->content, 350) }}</p>
            </div>

            <div class="ions_area">
                <ul>
                    <li>
                        <a class="modal_drop_theme"><i class="far fa-palette"></i></a>
                        <div class="theme_area">
                            <ul class="theme_color">
                                <li><a class="white active" href="#"><i class="far fa-tint-slash"></i></a>
                                </li>
                                @foreach (config('appearance.colors') as $color)

                                 <li class="appearance" data-color="{{ $color }}" data-type="color" data-id="{{ $note->id }}"><a class="red" style="background: {{ $color }}; " href="javascript:;"></a></li>
                               @endforeach
                            </ul>
                            <ul class="theme_img">
                                <li><a class="img_1 close active" href="#"></a></li>
                                @foreach (config('appearance.images') as $image)
                                 <li class="appearance" data-image="{{ $image }}" data-type="image" data-id="{{ $note->id }}"><a style="background: url('{{ asset($image) }}') " class="img_2" href="javascript:;"></a></li>
                                @endforeach

                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('notes.put-archived', $note->id) }}"><i class="far fa-box-alt"></i></a>
                    </li>
                    <li>
                        <a class="modal_drop_list"><i class="far fa-ellipsis-v"></i></a>
                        <ul class="drop_list">
                            <li><a href="javascript:;" onclick="$('.delete-note-{{ $note->id }}').submit();">delete note</a></li>
                            @if ($trash == true)
                              <li><a href="{{ route('notes.trash-restore', $note->id) }}">restore</a></li>
                            @endif

                        </ul>
                        <form class="delete-note-{{ $note->id }}" action="{{ route('notes.destroy', $note->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="permanent_delete" value="{{ $trash ? 1 : 0 }}">
                       </form>
                    </li>
                </ul>
                <!-- <a class="cancel_modal" href="#">cancel</a> -->
            </div>
        </div>
    </div>


    <div class="custom_modal_area" data-modal="modal_{{ $note->id }}">
        <div class="custom_modal_content"

        @if ($note->appearance_type == 'color')
        style="background:{{$note->color_name }}"
        @else
         style="background-image:url('{{ asset($note->image_path)}}')"
        @endif
        >
            <div class="pin_icon">
                <img src="images/pin_icons.png" alt="pin" class="img-fluid">
            </div>
            <form action="{{ route('notes.update', $note->id) }}" method="post" class="update-note-{{ $note->id }}">
                @csrf
                @method('PUT')
                <input type="text" placeholder="Title" name="title" value="{{ $note->title }}">
                <textarea rows="4" placeholder="Note" id="editorjs" name="content">{!! $note->content !!}</textarea>
            </form>
            <div class="ions_area">
                <ul>
                    <li>
                        <a class="modal_drop_theme"><i class="far fa-palette"></i></a>
                        <div class="theme_area">
                            <ul class="theme_color">
                                <li><a class="white active" href="#"><i class="far fa-tint-slash"></i></a></li>

                                <li><a class="red" href="#"></a></li>
                                <li><a class="blue" href="#"></a></li>
                                <li><a class="yellow" href="#"></a></li>
                                <li><a class="green" href="#"></a></li>
                                <li><a class="purple" href="#"></a></li>
                                <li><a class="orange" href="#"></a></li>
                                <li><a class="red" href="#"></a></li>
                                <li><a class="blue" href="#"></a></li>
                                <li><a class="yellow" href="#"></a></li>
                                <li><a class="green" href="#"></a></li>
                                <li><a class="purple" href="#"></a></li>


                            </ul>
                            <ul class="theme_img">
                                <li><a class="img_1 close active" href="#"></a></li>
                                <li><a class="img_2" href="#"></a></li>
                                <li><a class="img_3" href="#"></a></li>
                                <li><a class="img_4" href="#"></a></li>
                                <li><a class="img_5" href="#"></a></li>
                                <li><a class="img_6" href="#"></a></li>
                                <li><a class="img_4" href="#"></a></li>
                                <li><a class="img_5" href="#"></a></li>
                                <li><a class="img_6" href="#"></a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#"><i class="far fa-box-alt"></i></a>
                    </li>
                    <li>
                        <a class="modal_drop_list"><i class="far fa-ellipsis-v"></i></a>
                        <ul class="drop_list">
                            <li><a href="#">delete note</a></li>
                            <li><a href="#">add label</a></li>
                            <li><a href="#">add drawing</a></li>
                            <li><a href="#">make a copy</a></li>
                            <li><a href="#">vision history</a></li>
                        </ul>
                    </li>
                </ul>
                <a class="cancel_modal" href="javascript:;" onclick="$('.update-note-{{ $note->id }}').submit();">Save</a>
            </div>
        </div>
    </div>

@endforeach
