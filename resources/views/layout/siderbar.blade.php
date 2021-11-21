<div id="sidebar" class="float_l">
    <div class="sidebar_box"><span class="bottom"></span>
        <h3>Categories</h3>
        <div class="content">
            <ul class="sidebar_list">
                @if ($categories->count())
                @foreach ($categories as $category)
                <li><a href="{{ route('bycategorie', $category->libele) }}">{{ $category->libele }}</a></li>
                @endforeach
            @else
                <p>Pas de catégorie</p>
            @endif
            </ul>
        </div>
    </div>
    <div class="sidebar_box"><span class="bottom"></span>
        <h3>En promo </h3>
        <div class="content">
            {{-- <div class="bs_box">
                <a href="#"><img src="images/templatemo_image_01.jpg" alt="image" /></a>
                <h4><a href="#">Donec nunc nisl</a></h4>
                <p class="price">10 FCFA</p>
                <div class="cleaner"></div>
            </div> --}}
            Pas de promo en cours

        </div>
    </div>
</div>
