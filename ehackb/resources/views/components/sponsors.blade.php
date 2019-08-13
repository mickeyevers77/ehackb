<div class="bg-white mt-5 mb-5 pt-5 pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-auto">
                <h2 class="text-black m-4 text-uppercase">Sponsors</h2>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            @foreach(\App\Sponsor::all() as $sponsor)
                <div class="col-12 col-md-4">
                    <div class="mb-4 text-center">
                        <a href="{{ $sponsor->link }}" target="_blank" class="text-white">
                            @if($sponsor->getImage())
                                <img class="mw-100" alt="{{ $sponsor->title }}" src="{{ $sponsor->getImage('home') }}">
                            @else
                                {{ $sponsor->title }}
                            @endif
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
