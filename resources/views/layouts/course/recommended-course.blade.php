<div class="row display-flex">
        @foreach($course->getRecommendedCourse($course->id) as $recommendedCourse)

            <div class="col-xs-12 col-md-4">
                <a href="{{route(('course'), $recommendedCourse->id)}}">
                    <div class="thumbnail">
                        <img src="{{ URL::asset('images/gambar_course/'.$recommendedCourse->foto ) }}" alt="Gambar Kelas" height="120" width="500">
                        <div class="caption">
                            <h4 id="thumbnail-nama-kelas">
                                {{$recommendedCourse->nama_course}}
                            </h4>
                            <p><span class="ti-user"></span>{{ $recommendedCourse->creator->users->nama }}</p>
                            <p class="starability-result" data-rating="{{ round($recommendedCourse->getRating($recommendedCourse->id)->rating) }}"></p>

                            @if($recommendedCourse->harga > 0)
                                @if($recommendedCourse->diskon > 0)
                                <h5 class="text-right">
                                    <strike>Rp {{ number_format($recommendedCourse->harga, 0, ',', '.') }}</strike>
                                    Rp {{ number_format((100-$recommendedCourse->diskon)/100*$recommendedCourse->harga, 0, ',', '.') }}
                                </h5>
                                @else
                                <h5 class="text-right">
                                    Rp {{ number_format($recommendedCourse->harga, 0, ',', '.') }}
                                </h5>
                                @endif
                            @else
                            <h4 class="text-right"><span class="label label-warning">Gratis</span></h4>
                            @endif

                        </div>
                    </div>
                </a>
            </div>

        @endforeach

</div>
