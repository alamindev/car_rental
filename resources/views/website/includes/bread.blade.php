<section>
    <div class="container-fluid m-0 p-0">
        <div class="row no-gutters">
            <div class="col-lg-12">
                <div class="bread_crumb">
                    <img src="{{ asset('uploads/bread/bread.jpg') }}" class="img-fluid" width="100%">
                    <div class="bread_text">
                        <ul>
                            <li>
                                <a href="{{ route('home') }}">Home /</a>
                            </li>
                            <li>
                                <?php $segments = ''; ?> @foreach(Request::segments() as $segment)
                                <?php $segments .= '/'.$segment; ?>

                                <a href="{{ $segments }}">{{$segment}}</a> @endforeach
                            </li>
                        </ul>
                    </div>
                    <div class="bg_text">
                        <?php $segments = ''; ?> @foreach(Request::segments() as $segment)
                        <?php $segments .= '/'.$segment; ?>

                        <a href="{{ $segments }}">{{$segment}}</a> @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>