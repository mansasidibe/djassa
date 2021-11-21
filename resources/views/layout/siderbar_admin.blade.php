<div id="sidebar" class="float_l">
    <div class="sidebar_box"><span class="bottom"></span>
        <h3>Categories</h3>
        <div class="content">
            <ul class="sidebar_list">
                <li><a href="{{ route('admin.category.index') }}">Tous les catégories</a></li>
                <li><a href="{{ route('category.create') }}">Ajout de catégorie</a></li>
            </ul>
        </div>
    </div>

    <div class="sidebar_box"><span class="bottom"></span>
        <h3>Produits</h3>
        <div class="content">
            <ul class="sidebar_list">
                <li><a href="{{ route('admin.product.index') }}">Tous le produits</a></li>
                <li><a href="{{ route('product.create') }}">Ajout de produit</a></li>
            </ul>
        </div>
    </div>

    <div class="sidebar_box"><span class="bottom"></span>
        <h3>Parametrer le site</h3>
        <div class="content">
            <ul class="sidebar_list">
                <li class="first"><a href="#">logo</a></li>
            </ul>
        </div>
    </div>

</div>
