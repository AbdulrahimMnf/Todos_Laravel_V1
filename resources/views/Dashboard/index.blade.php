@extends('dashboard.layouts._')
@section('content')
<div class="content-wrapper pb-0">
    <div class="page-header flex-wrap">
        <h3 class="mb-0"> Hi, welcome back!
        </h3>
        <div class="d-flex">
            <div id="msg" class="btn btn-sm  btn-icon-text border ml-3">
            </div>
            <button id="btClickMe" onclick="event.preventDefault();document.getElementById('report-form').submit();" class="btn btn-sm bg-white btn-icon-text border ml-3">
                    <i class="mdi mdi-printer btn-icon-prepend"></i>
                    Report
                </button>
            <form id="report-form" action="{{route('report.index')}}" method="post">
                @csrf
            </form>
            <a href="{{route('todos.create')}}" class="btn btn-sm ml-3 btn-success"> Add Task </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 ">
            <div class="card bg-warning ">
                <div class="card-body px-3 py-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="color-card">
                            <p class="mb-0 color-card-head">Tüm Kullnıcılar</p>
                            <h2 class="text-white">98</h2>
                        </div>
                        <i class="card-icon-indicator mdi mdi-basket bg-inverse-icon-warning"></i>
                    </div>
                    <h6 class="text-white">76 yeni kullanıcı bu ayda</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
            <div class="card bg-danger">
                <div class="card-body px-3 py-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="color-card">
                            <p class="mb-0 color-card-head">Öğretmenler</p>
                            <h2 class="text-white">57</h2>
                        </div>
                        <i class="card-icon-indicator mdi mdi-cube-outline bg-inverse-icon-danger"></i>
                    </div>
                    <h6 class="text-white">4 yeni öğretmen bu ayda</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
            <div class="card bg-primary">
                <div class="card-body px-3 py-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="color-card">
                            <p class="mb-0 color-card-head">Öğrenciler</p>
                            <h2 class="text-white">26</h2>
                        </div>
                        <i class="card-icon-indicator mdi mdi-briefcase-outline bg-inverse-icon-primary"></i>
                    </div>
                    <h6 class="text-white">67 yeni öğrenci bu ayda</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-md-6 stretch-card pb-sm-3 pb-lg-0">
            <div class="card bg-success">
                <div class="card-body px-3 py-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="color-card">
                            <p class="mb-0 color-card-head">Veliler</p>
                            <h2 class="text-white">15</h2>
                        </div>
                        <i class="card-icon-indicator mdi mdi-account-circle bg-inverse-icon-success"></i>
                    </div>
                    <h6 class="text-white">3 yeni veliler bu ayda</h6>
                </div>
            </div>
        </div>

    </div>

</div>



<script>
    const btn = document.getElementById("btClickMe");
    let get = getCookie("clicked"); // check cookie after page loaded
    if (get) {
        btn.disabled = true; // disable the button after page loaded
    }

    btn.addEventListener("click", function(_event) {
        get = getCookie("clicked"); // check cookie exist
        if (!get) setCookie("clicked", "true", 1); // set cookie after clicked
        btn.disabled = true; // disable the button after button clicked
        var msg = document.getElementById("msg");
        msg.innerHTML = "We'll send a report to your email when it's ready and the button disabled in 24hrs";
    });

    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(";");
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == " ") c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }
</script>
@endsection
