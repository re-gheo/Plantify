@extends ('layouts/template')

@section('styles')
<style>
    .accordion {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    }

    .active_button, .accordion:hover {
        background-color: #ccc;
    }

    .panel {
        padding: 0 18px;
        background-color: white;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
    }
</style>
@endsection

@section('content')
<div class="p-5">

    <div class="row mb-3">
        <div class="col-lg-12">
            <div class="text-head pt-20">
                <h1><span class="sp-col-1 fs-50">Frequently Asked Questions</span></h1>
            </div>
        </div>
    </div>

    @foreach ($articles as $article)
    <div class="m-3">
        <button class="accordion">{{$article->article_topic}}</button>
        <div class="panel mt-3">
            <p> {{$article->article_description}}</p>
        </div>
    </div>
    @endforeach

</div>
@endsection

@section('scripts')
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active_button");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }
    </script>
@endsection
