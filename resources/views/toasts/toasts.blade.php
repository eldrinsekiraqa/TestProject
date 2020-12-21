@if(session('success'))
    <div class="toast mr-5" style="position: absolute; top: 10; right: 0;width: 300px" data-delay="3000">
        <div class="toast-header">
            <strong class="mr-auto">Alert</strong>
            <small>{{date('h:i:s A')}}</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body text-center">
            <h4>{{session('success')}}</h4>
        </div>
    </div>
    <script type="application/javascript">
        $('.toast').toast('show');
    </script>
@endif
