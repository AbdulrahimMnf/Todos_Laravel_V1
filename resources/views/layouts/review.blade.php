<div class="container shadow p-4">
    <form action="{{route('send-review')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Full Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter name">
            <small id="nameHelp" class="form-text text-muted"> Abdulrahim Manafihi </small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Mail Adress</label>
            <input type="email" class="form-control" name="email" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted"> test@mail.com</small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Subject</label>
            <input type="text" class="form-control" name="subject" placeholder="Enter subject">
            <small id="nameHelp" class="form-text text-muted"> subject</small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Message</label>
            <textarea name="message" cols="20" rows="5" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary m-2" disabled>Send</button>
    </form>
</div>
