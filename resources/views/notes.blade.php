<!DOCTYPE html>
<html lang="en">

<head>
    <title>NOTES</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/qiq24max1d92dgxzhncplxpdtlcsdbrcubtnos7hwlntut1i/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>

<body>

    @include('nav')

    <div class="container-fluid d-flex align-items-center justify-content-center" style="height: 250px;">

        <form action="" method="post">
            {{-- {{ url:"/"}} --}}
            @csrf

            <h3 class="text-center text-primary">
                {{ $title }}
            </h3>
            <div class="form-group">
                <label for="title">TITLE</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Title of note"
                    value="{{ old('title') }}" />
                <span class="text-danger">
                    @error('title')
                        {{ $message }}
                    @enderror
                </span>

                {{-- <label for="slug">Slug</label>

                <input type="text" class="form-control" name="slug" id="slug"
                    placeholder="slug is generating" /> --}}
            </div>

            <div class="form-group">
                <div class="form-group">
                    <label>File Upload</label>
                    <input type="file" class="form-control" name="file" placeholder="" />
                    <span class="text-danger ">
                        @error('file')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>



            <div class="form-group">
                <label class="form-label" for="description">Description</label>
                <textarea class="form-control" name="description" placeholder="Add description"></textarea>
            </div>

            <div class=" col-sm-7 text-center">
                <a href="{{ url('list') }}"></a>
                <button class="btn btn-primary">Submit</button>
            </div>


            <script>
                tinymce.init({
                    selector: 'textarea',
                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',



                    //For image upload in tinymce editor//

                    image_title: true,
                    automatic_uploads: true,
                    images_upload_url: '/upload',
                    file_picker_types: 'image',
                    file_picker_callback: function(cv, value, meta) {
                        var input = document.createElement('input');
                        input.setAttribute('type', 'file');
                        input.setAttribute('accept', 'image/*');
                        input.onchange = function() {
                            var file = this.files[0];
                            var reader = new FileReader();
                            reader.readAsDataURL(file);
                            render.onload = function() {
                                var id = 'blobid' + (new Date()).getTime();
                                var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                                var base64 = reader.result.split(',')[1];
                                var blobInfo = blobCache.create(id, file, base64);
                                blobCache.add(blobInfo);
                                cb(blobInfo.blobUri(), {
                                    title: file.name
                                });
                            };
                            input.click();
                        }
                    }
                });
            </script>
        </form>





        {{-- jquery for slug --}}
        {{-- <script>
            $('#title').keyup(function(e) {
                 //alert();

                $.get('{{ url('check_slug') }}',

                    {
                        'title': $('#title').val()
                    },
                    function(data) {
                        $('#slug').val(data.slug);
                    }

                );
            });
        </script> --}}

    </div>
</body>

</html>
