@if(session('success'))
    <div class="toast mr-5" style="position: absolute; top: 10; right: 0;width: 300px" data-delay="3000">
        <div class="toast-header">
            <strong class="mr-auto">Bootstrap</strong>
            <small>11 mins ago</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            {{session('success')}}
        </div>
    </div>
    <script type="application/javascript">
        $('.toast').toast('show');
    </script>
@endif
