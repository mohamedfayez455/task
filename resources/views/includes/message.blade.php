<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript" src="js/noty/packaged/jquery.noty.packaged.min.js"></script>
@if (session('success'))

    <script>
        alert("success");
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: "{{ session('success') }}",
            timeout: 2000,
            killer: true
        }).show();
    </script>

@endif
@if (session('info'))

    <script>
        new Noty({
            type: 'info',
            layout: 'topRight',
            text: "{{ session('info') }}",
            timeout: 4000,
            killer: true
        }).show();
    </script>

@endif

@if (session('error'))

    <script>
        new Noty({
            type: 'error',
            layout: 'topRight',
            text: "{{ session('error') }}",
            timeout: 2000,
            killer: true
        }).show();
    </script>

@endif


@if (count($errors->all())>0)
    <div class="row mt-2">
        <div class=" col-md-12">
            <ul class="list-group">
                @foreach($errors->all() as  $error)
                    <li class="list-group-item list-group-item-danger m-2" >{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
