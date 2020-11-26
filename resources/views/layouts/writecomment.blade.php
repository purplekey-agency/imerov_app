<div class="comment-container-write">
    <div class="col-md-6">
        <form id="comment-form" action="/admin/writecomment" method="POST">
        
            @csrf

            <textarea class="form-control" id="comment" name="comment">



            </textarea>

            <input type="hidden" name="recepientid" value="{{$id}}">
        
        </form>
    </div>
</div>